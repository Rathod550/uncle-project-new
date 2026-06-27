<?php

namespace App\Livewire\ContactUs;

use Livewire\Component;
use App\Models\ContactUs;

class ContactUsView extends Component
{
    public $contactUsId;

    public function mount($id)
    {
        $this->contactUsId = $id;
    }

    public function render()
    {
        $contactUs = ContactUs::findOrFail($this->contactUsId);
        return view('livewire.contact-us.contact-us-view', compact('contactUs'))->title('Contact Us View');
    }
}
