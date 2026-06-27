<?php

namespace App\Livewire\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;
use App\Models\FileUpload;
use App\Services\FileUploadService;

class SliderCreate extends Component
{
    use WithFileUploads;

    public $title, $image, $description;

    public function render()
    {
        return view('livewire.slider.slider-create')->title('Slider Create');
    }

    public function submit()
    {
        $this->validate([
            "title" => "required",
            "image" => "required",
            "description" => "required",
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/slider/');
        
        Slider::create([
            "title" => $this->title,
            "image" => $imageName,
            "description" => $this->description,
        ]);

        // for notifaction
        session()->flash('message', 'New Slider Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('slider.index');
    }
}
