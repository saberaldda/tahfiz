<?php

namespace App\Http\Livewire\Admin\Activities;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class ActivitiesList extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
    }
    
    public function updated()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->search = '';
    }

    public function render()
    {
        $activities = Activity::with('activityOptions')->withCount('activityOptions')
        ->when($this->search !== '', function ($query) {
            $query->where(function($subQuery) {
                $subQuery->where('name', 'like', "%$this->search%");
            });
        })
        ->orderByDesc('id')
        ->paginate(10);

        return view('livewire.admin.activities.activities-list', compact('activities'));
    }

    public function changeStatus($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = !$activity->status;
        $activity->save();
    }

    public function delete($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
    }
}
