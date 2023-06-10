<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;

class TopPoints extends Component
{
    public function render()
    {
        $users = User::with('points')
        ->where('type', 'student')
        ->get()
        ->map(function ($user) {
            $total_points = $user->points->sum(function ($point) {
                return $point->activityOption->points;
            });
    
            $user->total_points = $total_points;
            return $user;
        })
        ->sortByDesc('total_points');

        return view('livewire.home.top-points', compact('users'));
    }
}
