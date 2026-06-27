<?php

namespace App\Livewire\FreeConsultation;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FreeConsultation;

class FreeConsultationIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $freeConsultations = FreeConsultation::select('id', 'name', 'email', 'message')->latest('id')->paginate(10);
        return view('livewire.free-consultation.free-consultation-index', compact('freeConsultations'))->title('Free Consultation');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete FreeConsultation
            FreeConsultation::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Free Consultation Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('free-consultation.index');
        }
    }
}
