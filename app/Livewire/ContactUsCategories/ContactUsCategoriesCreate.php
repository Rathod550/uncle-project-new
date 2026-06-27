<?php

namespace App\Livewire\ContactUsCategories;

use Livewire\Component;
use App\Models\ContactUsCategories;
use Illuminate\Validation\Rule;

class ContactUsCategoriesCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.contact-us-categories.contact-us-categories-create')->title('Contact Us Categories Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('contact_us_categories', 'name')->whereNull('deleted_at')]
        ]);

        ContactUsCategories::create([
            "name" => $this->name,
        ]);

        // for notifaction
        session()->flash('message', 'New Contact Us Category Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('contactUs.categorys.index');
    }
}
