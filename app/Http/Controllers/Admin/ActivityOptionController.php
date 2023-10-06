<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityOption;

class ActivityOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Activity $activity)
    {
        return view('admin.activity-options.index', [
            'activity'  => $activity,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity, ActivityOption $option)
    {
        return view('admin.activity-options.edit', [
            'activity'          => $activity,
            'activityOption'    => $option,
        ]);
    }
}
