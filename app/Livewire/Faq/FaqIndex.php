<?php

namespace App\Livewire\Faq;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faq;

class FaqIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $faqs = Faq::select('id', 'faq_category_id', 'question',)->with('faqCategory')->latest('id')->paginate(10); 
        return view('livewire.faq.faq-index', compact('faqs'))->title('Faqs');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete sub category
            Faq::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Faq Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('faq.index');
        }
    }
}
