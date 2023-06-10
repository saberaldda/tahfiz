<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\User;
use Livewire\Component;

class Evaluation extends Component
{
    public $showToast = true;

    public $usersList;
    public $user;
    public $date;
    public $activityOptions = [];


    protected $rules = [
        'user'              => 'required',
        'date'              => 'required|date',
        'activityOptions'   => 'required|array',
    ];

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function usersList()
    {
        $this->usersList = User::withCount('points')
            ->where('type', 'student')
            ->orderByDesc('points_count')
            ->whereDoesntHave('points', function ($query) {
                $query->where('date', $this->date);
            })
            ->get();
    }

    public function updatedDate()
    {
        $this->usersList = $this->usersList();
    }

    public function render()
    {
        $usersList = $this->usersList();
        $activities = Activity::with('options')->get();

        return view('livewire.admin.users.evaluation', compact('usersList', 'activities'));
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addEvaluation()
    {
        // dd($this->activityOptions);
        $user = User::findOrFail($this->user);

        // Create points for the selected options
        foreach ($this->activityOptions as $activityId => $activityOptionId) {
            $option = ActivityOption::findOrFail($activityOptionId);
            $user->points()->create([
                'activity_option_id' => $option->id,
                'date' => $this->date,
            ]);
        }

        // Reset the form
        session()->flash('success', __("New user added successfully."));
        $this->reset(['user', 'activityOptions']);
    }

    // the dublcation entry
    // tost
}
