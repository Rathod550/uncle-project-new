<?php

namespace App\Livewire\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slider;

class SliderIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $sliders = Slider::select('id', 'image', 'title', 'description')->latest('id')->paginate(10);
        return view('livewire.slider.slider-index',compact('sliders'))->title('Slider');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete post
            Slider::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Slider Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('slider.index');
        }
    }
}
