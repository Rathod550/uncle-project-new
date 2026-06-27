<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $posts = Post::select('id', 'title', 'image', 'category_id', 'sub_category_id')->with('category', 'subCategory')->latest('id')->paginate(10);
        return view('livewire.post.post-index', compact('posts'))->title('Posts');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete post
            Post::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Post Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('posts.index');
        }
    }
}
