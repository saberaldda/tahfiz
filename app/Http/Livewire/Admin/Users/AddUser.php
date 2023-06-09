<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AddUser extends Component
{
    use WithFileUploads;

    public User $user;
    public $password;
    public $password_confirmation;
    public $photo;

    protected $rules = [
        'user.name'             => 'required|min:5',
        'user.email'            => 'required|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'user.type'             => 'required|in:student,teacher',
        'user.date_of_birth'    => 'nullable|date|before_or_equal:-5 years',
        // 'user.mobile_number'    => 'required|numeric|digits:12',
        // 'user.gender'           => 'required|in:male,female',
        'user.status'           => 'nullable|boolean',
        'user.note'             => 'nullable|string',
        'photo'                 => 'nullable|image|max:5000|mimes:png,jpg,jpeg,gif',
        'password'              => 'required|min:8',
        'password_confirmation' => 'required|same:password',
    ];

    protected $messages = [
        'user.email.regex'  => 'صيغة البريد الالكتروني يجب ان تكون مثل example@example.com',
    ];

    public function mount(User $user)
    {
        $this->user = $user ?? new User();
    }

    public function render()
    {
        return view('livewire.admin.users.add-user');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedUser()
    {
        $this->user->email = $this->user->name ? Str::slug($this->user->name) . '@gmail.com' : '';
    }

    public function saveUser()
    {
        $this->validate();

        if ($this->photo) {
            $photo_path = $this->photo->storeAs(
                'users-photos',
                time() . '_' . preg_replace('/\s+/', '_', $this->photo->getClientOriginalName()),
                'public'
            );

            $image = Image::make(Storage::disk('public')->path($photo_path));
            $image->fit(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save();

            $this->user->photo = $photo_path;
        }

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        if ($this->user->status == null) {
            $this->user->status = true;
        }

        $this->user->save();

        session()->flash('success', __("New user added successfully."));
        return redirect()->route('users.index');
    }

}
