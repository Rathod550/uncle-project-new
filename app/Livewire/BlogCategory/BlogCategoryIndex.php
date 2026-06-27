<?php

namespace App\Livewire\BlogCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogCategoryIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $blogCategorys = BlogCategory::select('id', 'name')->with('blogs')->latest('id')->paginate(10);
        return view('livewire.blog-category.blog-category-index', compact('blogCategorys'))->title('Blog Categories');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete blogs
            $blogs = Blog::where('blog_category_id', $this->itemIdToDelete)->get();
            if(!empty($blogs) && $blogs->count() > 0){
                foreach($blogs as $key => $value){
                    $value->delete();
                }
            }

            // delete category
            $blogCategory = BlogCategory::findOrFail($this->itemIdToDelete);
            $blogCategory->delete();

            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Blog Category And Its Blog Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('blog.categorys.index');
        }
    }
}
