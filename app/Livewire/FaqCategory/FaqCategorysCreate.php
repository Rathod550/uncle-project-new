<?php

namespace App\Livewire\FaqCategory;

use Livewire\Component;
use App\Models\FaqCategory;
use Illuminate\Validation\Rule;

class FaqCategorysCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.faq-category.faq-categorys-create')->title('Faq Categories Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('faq_categories', 'name')->whereNull('deleted_at')]
        ]);

        FaqCategory::create([
            "name" => $this->name,
            "slug" => makeSlug($this->name)
        ]);

        // for notifaction
        session()->flash('message', 'New Faq Category Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('faq-categorys.index');
    }
}
