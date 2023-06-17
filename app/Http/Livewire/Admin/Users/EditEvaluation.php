<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class EditEvaluation extends Component
{

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
        $date = $this->date;

        $usersList = $this->usersList = User::withCount(['points' => function ($query) use ($date) {
            $query->where('date', $date);
        }])
        ->where('type', 'student')
        // ->havingRaw('points_count < (SELECT COUNT(*) FROM activities)')
        // ->when(!Carbon::parse($this->date)->isThursday(), function ($query) {
        //     $query->havingRaw('points_count < (SELECT COUNT(*) - 1 FROM activities)');
        // })
        ->get();

        return $usersList;
    }

    public function activitiesList()
    {
        $date = $this->date;
    
        if (!$this->user) {
            return [];
        }
    
        $user = User::find($this->user);
    
        $activitiesList = Activity::whereIn('id', function ($query) use ($user, $date) {
            $query->select('activity_id')
                ->from('points')
                ->where('user_id', $user->id)
                ->where('date', $date);
        })
        ->with(['points' => function ($query) use ($user, $date) {
            $query->select('activity_id', 'activity_option_id')
                ->where('user_id', $user->id)
                ->where('date', $date);
        }])
        ->get();
    
        return $activitiesList;
    }   

    public function render()
    {
        $usersList = $this->usersList();
        $activitiesList = $this->activitiesList();

        // dd($activitiesList);


        return view('livewire.admin.users.edit-evaluation', compact('usersList', 'activitiesList'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedDate()
    {
        $this->usersList = $this->usersList();
    }

    public function updateEvaluation()
    {
        $user = User::findOrFail($this->user);

        foreach ($this->activityOptions as $activityId => $activityOptionId) {
            $option = ActivityOption::find($activityOptionId);

            if ($option) {
                // Check if the point already exists
                $point = $user->points()->where('activity_id', $activityId)->first();

                if ($point) {
                    // Point already exists, update the activity option and date
                    $point->update([
                        'activity_option_id' => $option->id,
                    ]);
                } else {
                    // Point doesn't exist, create a new point
                    $user->points()->create([
                        'activity_id' => $activityId,
                        'activity_option_id' => $option->id,
                        'date' => $this->date,
                    ]);
                }
            } else {
                // Option is null, delete the relation row if it exists
                $user->points()->where('activity_id', $activityId)->delete();
            }
        }

        session()->flash('success', __("New user added successfully."));
        // Reset the form
        $this->reset(['user', 'activityOptions']);
    }
}
