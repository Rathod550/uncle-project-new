<?php

namespace App\Livewire\BlogCategory;

use Livewire\Component;
use App\Models\BlogCategory;
use Illuminate\Validation\Rule;

class BlogCategoryEdit extends Component
{

    public $blogCategoryId;
    public $name;

    public function mount($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        $this->blogCategoryId = $blogCategory->id;
        $this->name = $blogCategory->name;
    }

    public function render()
    {
        return view('livewire.blog-category.blog-category-edit')->title('Blog Categories Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('blog_categories', 'name')->ignore($this->blogCategoryId)->whereNull('deleted_at')]
        ]);

        $blogCategory = BlogCategory::findOrFail($this->blogCategoryId);
        $blogCategory->name = $this->name;
        $blogCategory->save();

        // for notifaction
        session()->flash('message', 'Blog Category Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('blog.categorys.index');
    }
}
