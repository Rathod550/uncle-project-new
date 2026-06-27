<?php

namespace App\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class SiteSettingUpdate extends Component
{
    use WithFileUploads;

    public $setting=[];

    public function mount()
    {
        $data = Setting::pluck('value','slug')->all();
        $this->setting['contact-us-mobile-number'] = $data['contact-us-mobile-number'];
    }

    public function render()
    {
        $data = Setting::get()->toArray();
        $settings = [];
        foreach ($data as $value) {
            $settings[$value['slug']] = $value;
        }
        return view('livewire.setting.site-setting-update',compact('settings'));
    }

    public function submit()
    {
        $this->validate([
            'setting.*' => 'required',
        ]);

        info($this->setting);

        $this->setting['main-header-logo'] = FileUploadService::uploadFileOnPublic($this->setting['main-header-logo'],'uploads/settings/');

        foreach ($this->setting as $key=>$value){
            $settingObj = Setting::where('slug',$key)->first();
            if (!is_null($settingObj)) {
                $settingObj->update(array('value'=>$value)); 
            }
        }

        session()->flash('message', 'Site Setting Has Been Updated.');
        session()->flash('message_type', 'Updated');

        return redirect()->route('site-setting.index');
    }
}
