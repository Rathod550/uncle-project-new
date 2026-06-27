<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class CategoryEdit extends Component
{
    use WithFileUploads;

    public $categoryId, $name, $image, $description;

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function render()
    {
        return view('livewire.category.category-edit')->title('Post Categories Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($this->categoryId)->whereNull('deleted_at')],
            'description' => 'required',
        ]);

        $category = Category::findOrFail($this->categoryId);

        $imageName = $category->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/categorys/');
        }

        $category->name = $this->name;
        $category->description = $this->description;
        $category->image = $imageName;
        $category->save();

        // for notifaction
        session()->flash('message', 'Category Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('categorys.index');
    }
}
