<?php

namespace App\Livewire\ClientReview;

use Livewire\Component;
use App\Models\ClientReview;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class ClientReviewCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $designation;
    public $review;
    public $image;

    public function render()
    {
        return view('livewire.client-review.client-review-create')->title('Client Reviews Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'designation' => 'required',
            'review' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/clientReviews/');

        ClientReview::create([
            'name' => $this->name,
            'designation' => $this->designation,
            'review' => $this->review,
            'image' => $imageName,
        ]);

        session()->flash('message', 'New Client Review Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('client-reviews.index');
    }
}
