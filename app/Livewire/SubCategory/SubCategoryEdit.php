<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class SubCategoryEdit extends Component
{
    use WithFileUploads;

    public $subCategoryId, $category_id, $name, $image, $description;

    public function mount($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $this->subCategoryId = $subCategory->id;
        $this->category_id = $subCategory->category_id;
        $this->name = $subCategory->name;
        $this->description = $subCategory->description;
    }

    public function render()
    {
        $categoryes = Category::latest()->get();
        return view('livewire.sub-category.sub-category-edit', compact('categoryes'))->title('Sub Categories Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required',Rule::unique('sub_categories', 'name')->ignore($this->subCategoryId)->whereNull('deleted_at')],
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $subCategory = SubCategory::findOrFail($this->subCategoryId);

        $imageName = $subCategory->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/subCategorys/');
        }

        $subCategory->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'image' => $imageName,
            'description' => $this->description
        ]);

        session()->flash('message', 'Sub Category Has Been Updated Successfully.');
        session()->flash('message_type', 'success');

        return redirect()->route('sub.categorys.index');
    }
}