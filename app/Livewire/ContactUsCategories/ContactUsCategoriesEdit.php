<?php

namespace App\Livewire\ContactUsCategories;

use Livewire\Component;
use App\Models\ContactUsCategories;
use Illuminate\Validation\Rule;

class ContactUsCategoriesEdit extends Component
{
    public $contactUsCategoryId;
    public $name;

    public function mount($id)
    {
        $contactUsCategory = ContactUsCategories::findOrFail($id);
        $this->contactUsCategoryId = $contactUsCategory->id;
        $this->name = $contactUsCategory->name;
    }

    public function render()
    {
        return view('livewire.contact-us-categories.contact-us-categories-edit')->title('Contact Us Categories Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('contact_us_categories', 'name')->ignore($this->contactUsCategoryId)->whereNull('deleted_at')]
        ]);

        $contactUsCategory = ContactUsCategories::findOrFail($this->contactUsCategoryId);
        $contactUsCategory->name = $this->name;
        $contactUsCategory->save();

        // for notifaction
        session()->flash('message', 'Contact Us Category Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('contactUs.categorys.index');
    }
}
