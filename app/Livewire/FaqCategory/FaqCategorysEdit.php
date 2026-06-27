<?php

namespace App\Livewire\FaqCategory;

use Livewire\Component;
use App\Models\FaqCategory;
use Illuminate\Validation\Rule;

class FaqCategorysEdit extends Component
{
    public $faqCategoryId, $name;

    public function mount($id)
    {
        $faqCategory = FaqCategory::findOrFail($id);
        $this->faqCategoryId = $faqCategory->id;
        $this->name = $faqCategory->name;
    }

    public function render()
    {
        return view('livewire.faq-category.faq-categorys-edit')->title('Faq Categories Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('faq_categories', 'name')->ignore($this->faqCategoryId)->whereNull('deleted_at')]
        ]);

        $faqCategory = FaqCategory::findOrFail($this->faqCategoryId);
        $faqCategory->name = $this->name;
        $faqCategory->slug = makeSlug($this->name);
        $faqCategory->save();

        // for notifaction
        session()->flash('message', 'Faq Category Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('faq-categorys.index');
    }
}
