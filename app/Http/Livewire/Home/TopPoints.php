<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;

class TopPoints extends Component
{
    public function render()
    {
        $users = User::withCount('points')
        ->where('type', 'student')
        ->orderByDesc('points_count')
        ->get();


        return view('livewire.home.top-points', compact('users'));
    }
}
