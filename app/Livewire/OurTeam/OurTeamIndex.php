<?php

namespace App\Livewire\OurTeam;

use Livewire\Component;
use App\Models\OurTeam;
use Livewire\WithPagination;

class OurTeamIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $ourTeams = OurTeam::select('id', 'name', 'image', 'company_role')->latest('id')->paginate(10);
        return view('livewire.our-team.our-team-index', compact('ourTeams'))->title('Our Team');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            // delete OurTeam
            OurTeam::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'Our Team Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('our-team.index');
        }
    }
}
