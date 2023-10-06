<?php

namespace App\Http\Livewire\Admin\ActivityOptions;

use App\Models\ActivityOption;
use Livewire\Component;

class UpdateOption extends Component
{
    public $activity;
    public ActivityOption $activityOption;

    protected function rules()
    {
        return [
            'activityOption.name'   => 'required|min:3',
            'activityOption.points' => 'required|numeric',
        ];
    }

    public function mount(ActivityOption $activityOption)
    {
        $this->activityOption = $activityOption;
        $this->activityOption->activity_id = $this->activity->id;
    }

    public function render()
    {
        return view('livewire.admin.activity-options.update-option');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->activityOption->activity_id = $this->activity->id;
        $this->activityOption->save();

        session()->flash('success', __("New option added successfully."));
        return redirect()->route('activities.options.index', ['activity' => $this->activity]);
    }
}
