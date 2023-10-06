<?php

namespace App\Http\Livewire\Admin\Activities;

use App\Models\Activity;
use Livewire\Component;

class UpdateActivity extends Component
{
    public Activity $activity;

    protected function rules()
    {
        return [
            'activity.name'    => 'required|min:3',
        ];
    }

    public function mount(Activity $activity)
    {
        $this->activity = $activity ?? new Activity();
    }

    public function render()
    {
        return view('livewire.admin.activities.update-activity');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->activity->save();

        session()->flash('success', __("New activity added successfully."));
        return redirect()->route('activities.index');
    }
}
