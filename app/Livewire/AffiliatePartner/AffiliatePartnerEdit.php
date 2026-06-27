<?php

namespace App\Livewire\AffiliatePartner;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;
use App\Models\AffiliatePartner;

class AffiliatePartnerEdit extends Component
{
    use WithFileUploads;

    public $affiliatePartnerId;
    public $name;
    public $image;

    public function mount($id)
    {
        $affiliatePartner = AffiliatePartner::findOrFail($id);
        $this->affiliatePartnerId = $affiliatePartner->id;
        $this->name = $affiliatePartner->name;
    }

    public function render()
    {
        return view('livewire.affiliate-partner.affiliate-partner-edit')->title('Affiliate Partners Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $affiliatePartner = AffiliatePartner::findOrFail($this->affiliatePartnerId);

        $imageName = $affiliatePartner->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/affiliatePartners/');
        }

        $affiliatePartner->update([
            'name' => $this->name,
            'image' => $imageName,
        ]);

        session()->flash('message', 'Affiliate Partner Has Been Updated Successfully.');
        session()->flash('message_type', 'update');

        return redirect()->route('affiliate-partners.index');
    }
}
