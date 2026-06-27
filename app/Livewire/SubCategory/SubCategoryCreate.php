<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class SubCategoryCreate extends Component
{
    use WithFileUploads;
    
    public $name, $category_id, $image, $description;

    public function render()
    {
        $categoryes = Category::latest()->get();
        return view('livewire.sub-category.sub-category-create', compact('categoryes'))->title('Sub Categories Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('sub_categories', 'name')->whereNull('deleted_at')],
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/subCategorys/');

        SubCategory::create([
            "name" => $this->name,
            "category_id" => $this->category_id,
            "image" => $imageName,
            'description' => $this->description
        ]);

        // for notifaction
        session()->flash('message', 'New Sub Category Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('sub.categorys.index');
    }
}
