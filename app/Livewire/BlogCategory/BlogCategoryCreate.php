<?php

namespace App\Livewire\BlogCategory;

use Livewire\Component;
use App\Models\BlogCategory;
use Illuminate\Validation\Rule;

class BlogCategoryCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.blog-category.blog-category-create')->title('Blog Categories Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('blog_categories', 'name')->whereNull('deleted_at')]
        ]);

        BlogCategory::create([
            "name" => $this->name,
        ]);

        // for notifaction
        session()->flash('message', 'New Blog Category Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('blog.categorys.index');
    }
}
