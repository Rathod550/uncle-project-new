<?php

namespace App\Livewire\AffiliatePartner;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AffiliatePartner;

class AffiliatePartnerIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $affiliatePartners = AffiliatePartner::select('id', 'name', 'image')->latest('id')->paginate(10);

        return view('livewire.affiliate-partner.affiliate-partner-index',compact('affiliatePartners'))->title('Affiliate Partners');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete Affiliate Partners
            AffiliatePartner::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Affiliate Partners Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('affiliate-partners.index');
        }
    }
}
