<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Activity;
use App\Models\User;
use Livewire\Component;

class Evaluation extends Component
{

    public $user;
    public $date;
    public $activity1;
    public $activity2;
    public $activity3;
    public $activity4;
    public $activity5;
    public $activity6;
    public $activity7;
    public $activity8;
    public $activity9;
    public $activity10;

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        $users = User::withCount('points')
        ->where('type', 'student')
        ->orderByDesc('points_count')
        ->get();

        $activities = Activity::with('options')->get();

        return view('livewire.admin.users.evaluation', compact('users','activities'));
    }

    public function addEvaluation()
    {
        
    }
}
