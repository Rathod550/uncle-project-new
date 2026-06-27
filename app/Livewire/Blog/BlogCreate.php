<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class BlogCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $description = '';
    public $blog_category_id;

    public function render()
    {
        $blogCategoryes = BlogCategory::latest()->get();
        return view('livewire.blog.blog-create', compact('blogCategoryes'))->title('Blogs Create');
    }

    public function submit()
    {

        $this->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'blog_category_id' => 'required'
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/blogs/');

        Blog::create([
            'admin_id' => auth()->user()->id, 
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'blog_category_id' => $this->blog_category_id,
            'slug' => makeSlug($this->title),
        ]);

        session()->flash('message', 'New Blog Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('blogs.index');
    }
}
