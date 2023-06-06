<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;

class ShowOrder extends Component
{
    public function render()
    {
        $users = User::withCount('points')
        ->where('type', 'student')
        ->orderByDesc('points_count')
        ->get();


        return view('livewire.home.show-order', compact('users'));
    }
}
