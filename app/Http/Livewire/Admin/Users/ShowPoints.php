<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Activity;
use App\Models\Point;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPoints extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $date;


    public function render()
    {
        $users = User::with('points.activity.activityOptions')
        ->where('type', 'student')
        ->paginate();
        $activities = Activity::all();
        $points_date = Point::distinct('date')->get('date');

        $points = Point::with('activity.activityOptions')
            ->where('user_id', $this->user)
            ->whereIn('date', $points_date)
            ->orderByDesc('date')
            ->get()
            ->groupBy('date', 'desc');

        // dd($points_date);

        return view('livewire.admin.users.show-points', compact('users', 'activities', 'points_date', 'points'));
    }
}
