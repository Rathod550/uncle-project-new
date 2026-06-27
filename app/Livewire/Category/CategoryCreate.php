<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class CategoryCreate extends Component
{
    use WithFileUploads;

    public $name, $image, $description;

    public function render()
    {
        return view('livewire.category.category-create')->title('Post Categories Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('categories', 'name')->whereNull('deleted_at')],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/categorys/');

        Category::create([
            "name" => $this->name,
            'image' => $imageName,
            'description' => $this->description
        ]);

        // for notifaction
        session()->flash('message', 'New Category Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('categorys.index');
    }
}
