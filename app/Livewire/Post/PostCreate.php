<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class PostCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $description;
    public $category_id;
    public $sub_category_id;
    public $subCategories = [];

    public function loadSubCategories()
    {
        if ($this->category_id) {
            $this->subCategories = SubCategory::where('category_id', $this->category_id)->get();
        }else{
            $this->subCategories = [];
        }
        $this->reset('sub_category_id');
    }
    public function render()
    {
        $categoryes = Category::latest()->get();
        return view('livewire.post.post-create', compact('categoryes'))->title('Posts Create');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/posts/');

        Post::create([
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'slug' => makeSlug($this->title),
        ]);

        session()->flash('message', 'New Post Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('posts.index');
    }


}
