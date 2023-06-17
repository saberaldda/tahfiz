<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class SettingsList extends Component
{
    public $settings = [];

    public function mount()
    {
        $this->settings = $this->settingsList();
    }

    public function settingsList()
    {
        $settingsList = Setting::all('key', 'value')->pluck('value', 'key')->toArray();
        return $settingsList;
    }

    public function render()
    {
        return view('livewire.admin.settings.settings-list');
    }

    public function updateSetting()
    {
        foreach ($this->settings as $key => $value) {
            Setting::set($key, $value);
        }

        session()->flash('success', __("Settings updated successfully."));
    }
}
