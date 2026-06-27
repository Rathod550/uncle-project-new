<?php

namespace App\Livewire\OurTeam;

use Livewire\Component;
use App\Models\OurTeam;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class OurTeamEdit extends Component
{
    use WithFileUploads;

    public $ourTeamId, $name, $image, $company_role, $facebook_link, $instagram_link, $linkedin_link;

    public function mount($id)
    {
        $ourTeam = OurTeam::findOrFail($id);
        $this->ourTeamId = $ourTeam->id;
        $this->name = $ourTeam->name;
        $this->company_role = $ourTeam->company_role;
        $this->facebook_link = $ourTeam->facebook_link;
        $this->instagram_link = $ourTeam->instagram_link;
        $this->linkedin_link = $ourTeam->linkedin_link;
    }

    public function render()
    {
        return view('livewire.our-team.our-team-edit')->title('Our Team Edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('our_teams', 'name')->ignore($this->ourTeamId)->whereNull('deleted_at')],
            'company_role' => 'required',
        ]);

        $ourTeam = OurTeam::findOrFail($this->ourTeamId);

        $imageName = $ourTeam->image;
        if ($this->image) {
            $imageName = FileUploadService::uploadFileOnPublic($this->image, 'uploads/ourTeam/');
        }

        $ourTeam->name = $this->name;
        $ourTeam->image = $imageName;
        $ourTeam->company_role = $this->company_role;
        $ourTeam->facebook_link = $this->facebook_link;
        $ourTeam->instagram_link = $this->instagram_link;
        $ourTeam->linkedin_link = $this->linkedin_link;
        $ourTeam->save();

        // for notifaction
        session()->flash('message', 'Our Team Has Been Updated..');
        session()->flash('message_type', 'update');

        return redirect()->route('our-team.index');
    }
}
