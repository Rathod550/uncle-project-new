<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class PostEdit extends Component
{
    use WithFileUploads;

    public $postId;
    public $title;
    public $image;
    public $description;
    public $category_id;
    public $sub_category_id;
    public $subCategories = [];

    public function mount($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->category_id = $post->category_id;
        $this->sub_category_id = $post->sub_category_id;
        
        // Load subcategories based on the post's category
        $this->loadSubCategories();
    }

    public function loadSubCategories()
    {
        if ($this->category_id) {
            $this->subCategories = SubCategory::where('category_id', $this->category_id)->get();
        } else {
            $this->subCategories = [];
        }
    }

    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.post.post-edit', compact('categories'))->title('Posts Edit');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        $post = Post::findOrFail($this->postId);

        $imageName = $post->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/posts/');
        }

        $post->update([
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'slug' => makeSlug($this->title),
        ]);

        session()->flash('message', 'Post Has Been Updated Successfully.');
        session()->flash('message_type', 'update');

        return redirect()->route('posts.index');
    }
}