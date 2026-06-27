<?php

namespace App\Livewire\FaqCategory;

use Livewire\Component;
use App\Models\FaqCategory;
use App\Models\Faq;
use Livewire\WithPagination;

class FaqCategorysIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $faqCategorys = FaqCategory::select('id', 'name')->with('faqs')->latest('id')->paginate(10);
        return view('livewire.faq-category.faq-categorys-index', compact('faqCategorys'))->title('Faq Categories');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete faqs
            $faqs = Faq::where('faq_category_id', $this->itemIdToDelete)->get();
            if(!empty($faqs) && $faqs->count() > 0){
                foreach($faqs as $key => $value){
                    $value->delete();
                }
            }

            // delete faq category
            FaqCategory::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Faq Category And Its Faqs Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('faq-categorys.index');
        }
    }
}
