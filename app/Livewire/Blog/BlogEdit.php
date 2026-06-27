<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Services\FileUploadService;

class BlogEdit extends Component
{
    use WithFileUploads;

    public $blogId;
    public $title;
    public $image;
    public $description;
    public $blog_category_id;

    public function mount($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->description = !empty($blog->description) ? $blog->description : '';
        $this->blog_category_id = $blog->blog_category_id;
    }

    public function render()
    {
        info($this->description);
        $blogCategoryes = BlogCategory::latest()->get();
        return view('livewire.blog.blog-edit', compact('blogCategoryes'))->title('Blogs Edit');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'blog_category_id' => 'required|exists:blog_categories,id',
        ]);

        $blog = Blog::findOrFail($this->blogId);

        $imageName = $blog->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/blogs/');
        }

        $blog->update([
            'admin_id' => auth()->user()->id,
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'blog_category_id' => $this->blog_category_id,
            'slug' => makeSlug($this->title),
        ]);

        session()->flash('message', 'Blog Has Been Updated Successfully.');
        session()->flash('message_type', 'update');

        return redirect()->route('blogs.index');
    }
}
