<?php

namespace App\Http\Livewire\Admin\ActivityOptions;

use App\Models\ActivityOption;
use Livewire\Component;
use Livewire\WithPagination;

class OptionsList extends Component
{
    use WithPagination;

    public $activity;
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
        $activityOptions = ActivityOption::query()
            ->where('activity_id', $this->activity->id)
            ->paginate(10);

        return view('livewire.admin.activity-options.options-list', compact('activityOptions'));
    }
        
    
    public function delete($id)
    {
        $activityOptions = ActivityOption::findOrFail($id);
        $activityOptions->delete();
    }
}
