<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $blogs = Blog::select('id', 'title', 'image', 'blog_category_id',)->with('blogCategory')->latest('id')->paginate(10);
        return view('livewire.blog.blog-index', compact('blogs'))->title('Blogs');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete Blog
            Blog::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Blog Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('blogs.index');
        }
    }
}
