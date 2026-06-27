<?php

namespace App\Livewire\ClientReview;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;
use App\Models\ClientReview;

class ClientReviewEdit extends Component
{
    use WithFileUploads;

    public $clientReviewId;
    public $name;
    public $designation;
    public $review;
    public $image;

    public function mount($id)
    {
        $clientReview = ClientReview::findOrFail($id);
        $this->clientReviewId = $clientReview->id;
        $this->name = $clientReview->name;
        $this->designation = $clientReview->designation;
        $this->review = $clientReview->review;
    }

    public function render()
    {
        return view('livewire.client-review.client-review-edit')->title('Client Reviews Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'review' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $clientReview = ClientReview::findOrFail($this->clientReviewId);

        $imageName = $clientReview->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/clientReviews/');
        }

        $clientReview->update([
            'name' => $this->name,
            'designation' => $this->designation,
            'review' => $this->review,
            'image' => $imageName,
        ]);

        session()->flash('message', 'Affiliate Partner Has Been Updated Successfully.');
        session()->flash('message_type', 'update');

        return redirect()->route('client-reviews.index');
    }
}
