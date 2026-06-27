<?php

namespace App\Livewire\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;

class CategoryIndex extends Component
{

    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $categorys = Category::select('id', 'name', 'image')->with('subCategories', 'posts')->latest('id')->paginate(10);
        return view('livewire.category.category-index', compact('categorys'))->title('Post Categories');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete sub categoryes
            $subCategorys = SubCategory::where('category_id', $this->itemIdToDelete)->get();
            if(!empty($subCategorys) && $subCategorys->count() > 0){
                foreach($subCategorys as $key => $value){
                    $value->delete();
                }
            }

            // delete posts
            $posts = Post::where('category_id', $this->itemIdToDelete)->get();
            if(!empty($posts) && $posts->count() > 0){
                foreach($posts as $key => $value){
                    $value->delete();
                }
            }

            // delete category
            Category::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Category And Its Sub Category Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('categorys.index');
        }
    }
}
