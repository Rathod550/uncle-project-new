<?php

namespace App\Livewire\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;
use App\Models\FileUpload;
use App\Services\FileUploadService;

class SliderEdit extends Component
{
    use WithFileUploads;

    public $slider;
    public $title, $description, $image;

    public function mount($id)
    {
        $this->slider = Slider::findOrFail($id);
        $this->title = $this->slider->title;
        $this->description = $this->slider->description;
    }

    public function render()
    {
        return view('livewire.slider.slider-edit')->title('Slider Edit');
    }

    public function submit()
    {
        $this->validate([
            "title" => "required",
            "description" => "required",
        ]);

        $data = [
            "title" => $this->title,
            "description" => $this->description,
        ];

        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/slider/');
            $data['image'] = $imageName;
        }

        $this->slider->update($data);

        // for notification
        session()->flash('message', 'Slider Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('slider.index');
    }
}