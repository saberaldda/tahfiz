<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Activity;
use App\Models\ActivityOption;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Evaluation extends Component
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
        ->havingRaw('points_count < (SELECT COUNT(*) FROM activities)')
        ->when(!Carbon::parse($this->date)->isThursday(), function ($query) {
            $query->havingRaw('points_count < (SELECT COUNT(*) - 1 FROM activities)');
        })
        ->get();

        return $usersList;
    }

    public function activitiesList()
    {
        $activity_id = 10;  // for جلسة الخميس
        $date = $this->date;

        if (!$this->user) {
            return $activitiesList = [];
        }
        $user = User::find($this->user);

        $activitiesList = Activity::with(['activityOptions' => function ($query) use ($user, $date) {
            $query->whereDoesntHave('points', function ($query) use ($user, $date) {
                $query->where('user_id', $user->id)
                    ->where('date', $date);
            });
        }])
            ->whereDoesntHave('activityOptions.points', function ($query) use ($user, $date) {
                $query->where('user_id', $user->id)
                    ->where('date', $date);
            })
            ->when(!Carbon::parse($date)->isThursday(), function ($query) use ($activity_id) {
                $query->where('id', '!=', $activity_id);
            })
            ->get();

        return $activitiesList;
    }

    public function render()
    {
        $usersList = $this->usersList();
        $activitiesList = $this->activitiesList();

        // dd($activitiesList);


        return view('livewire.admin.users.evaluation', compact('usersList', 'activitiesList'));
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function updatedDate()
    {
        $this->usersList = $this->usersList();
    }

    public function addEvaluation()
    {
        // dd($this->activityOptions);
        $user = User::findOrFail($this->user);

        // Create points for the selected options
        foreach ($this->activityOptions as $activityId => $activityOptionId) {
            if (!empty($activityOptionId)) {
                $option = ActivityOption::findOrFail($activityOptionId);
                $user->points()->create([
                    'activity_id'   => $activityId,
                    'activity_option_id' => $option->id,
                    'date' => $this->date,
                ]);
            }
        }

        session()->flash('success', __("New user added successfully."));
        // Reset the form
        $this->reset(['user', 'activityOptions']);
    }
}
