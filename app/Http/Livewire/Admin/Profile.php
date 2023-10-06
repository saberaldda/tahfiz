<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
        'user.name'            => 'nullable',
        'password'              => 'nullable|min:8',
        'password_confirmation' => 'nullable|same:password',
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProfile()
    {
        $this->validate();

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        session()->flash('success', __("Profile updated successfully."));
        return redirect()->route('dashboard');
    }
}
