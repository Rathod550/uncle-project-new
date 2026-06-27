<?php

namespace App\Livewire\AffiliatePartner;

use Livewire\Component;
use App\Models\AffiliatePartner;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class AffiliatePartnerCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function render()
    {
        return view('livewire.affiliate-partner.affiliate-partner-create')->title('Affiliate Partners Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/affiliatePartners/');

        AffiliatePartner::create([
            'name' => $this->name,
            'image' => $imageName,
        ]);

        session()->flash('message', 'New Affiliate Partner Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('affiliate-partners.index');
    }
}
