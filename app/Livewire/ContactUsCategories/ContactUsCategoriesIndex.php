<?php

namespace App\Livewire\ContactUsCategories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactUsCategories;

class ContactUsCategoriesIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $contactUsCategories = ContactUsCategories::select('id', 'name')->with('contactUs')->latest('id')->paginate(10);
        return view('livewire.contact-us-categories.contact-us-categories-index', compact('contactUsCategories'))->title('Contact Us Categories');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete ContactUsCategories
            ContactUsCategories::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Contact Us Categories Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('contactUs.categorys.index');
        }
    }
}
