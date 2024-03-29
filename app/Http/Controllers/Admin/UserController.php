<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user'      => $user,
        ]);
    }

    public function evaluation()
    {
        return view('admin.users.evaluation');
    }
    
    public function editEvaluation()
    {
        return view('admin.users.edit-evaluation');
    }

    public function showPoints()
    {
        return view('admin.users.show-points');
    }
}
