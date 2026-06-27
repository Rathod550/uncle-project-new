<?php

namespace App\Livewire\ClientReview;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClientReview;

class ClientReviewIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $clientReviews = ClientReview::select('id', 'name', 'designation', 'review', 'image')->latest('id')->paginate(10);

        return view('livewire.client-review.client-review-index',compact('clientReviews'))->title('Client Reviews');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            ClientReview::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Client Review Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('client-reviews.index');
        }
    }
}
