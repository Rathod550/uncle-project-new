<?php

namespace App\Livewire\Faq;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqCreate extends Component
{
    public $faq_category_id, $question, $answer;

    public function render()
    {
        $faqCategorys = FaqCategory::latest()->get();
        return view('livewire.faq.faq-create', compact('faqCategorys'))->title('Faq Create');
    }

    public function submit()
    {
        $this->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create([
            "faq_category_id" => $this->faq_category_id,
            "question" => $this->question,
            "question_slug" => makeSlug($this->question),
            'answer' => $this->answer
        ]);

        // for notifaction
        session()->flash('message', 'New Faq Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('faq.index');
    }
}
