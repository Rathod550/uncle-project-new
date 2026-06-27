<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Post;

class SubCategoryIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;
    
    public function render()
    {
        $subCategorys = SubCategory::select('id', 'name', 'category_id', 'image')->with('category', 'posts')->latest('id')->paginate(10); 
        return view('livewire.sub-category.sub-category-index', compact('subCategorys'))->title('Sub Categories');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete posts
            $posts = Post::where('sub_category_id', $this->itemIdToDelete)->get();
            if(!empty($posts) && $posts->count() > 0){
                foreach($posts as $key => $value){
                    $value->delete();
                }
            }

            // delete sub category
            SubCategory::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Sub Category Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('sub.categorys.index');
        }
    }
}
