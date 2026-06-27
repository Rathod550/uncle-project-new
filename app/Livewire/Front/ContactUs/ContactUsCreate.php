<?php

namespace App\Livewire\Front\ContactUs;

use Livewire\Component;
use App\Models\ContactUs;
use App\Models\ContactUsCategories;

class ContactUsCreate extends Component
{
    public $name, $contact_number, $email, $contact_us_categories_id, $message;

    public function render()
    {
        return view('livewire.front.contact-us.contact-us-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
            "name" => $this->name,
            "contact_number" => $this->contact_number,
            "email" => $this->email,
            "contact_us_categories_id" => $this->contact_us_categories_id,
            "message" => $this->message
        ]);

        $this->reset(['name', 'email', 'message']);

        // for notifaction
        session()->flash('message', 'Thanks for reaching out! I’ll reply soon.');
        session()->flash('message_type', 'create');

        // return redirect()->route('front.home');
    }
}
