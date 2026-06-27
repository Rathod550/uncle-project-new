<?php

namespace App\Livewire\ContactUs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactUs;

class ContactUsIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $contactUs = ContactUs::select('id', 'name', 'contact_us_categories_id')->with('category')->latest('id')->paginate(10);
        return view('livewire.contact-us.contact-us-index', compact('contactUs'))->title('Contact Us');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete Blog
            ContactUs::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Contact Us Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('contact-us.index');
        }
    }
}
