<?php

namespace App\Livewire\Faq;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqEdit extends Component
{
    public $faqCategoryId, $faq_category_id, $question, $answer;

    public function mount($id)
    {
        $faq = Faq::findOrFail($id);
        $this->faqCategoryId = $faq->id;
        $this->faq_category_id = $faq->faq_category_id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function render()
    {
        $faqCategorys = FaqCategory::latest()->get();
        return view('livewire.faq.faq-edit', compact('faqCategorys'))->title('Faq Edit');
    }

    public function submit()
    {
        $this->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = Faq::findOrFail($this->faqCategoryId);

        $faq->update([
            'faq_category_id' => $this->faq_category_id,
            'question' => $this->question,
            'answer' => $this->answer
        ]);

        session()->flash('message', 'Faq Has Been Updated Successfully.');
        session()->flash('message_type', 'success');

        return redirect()->route('faq.index');
    }
}
