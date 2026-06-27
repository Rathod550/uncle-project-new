<?php

namespace App\Livewire\OurTeam;

use Livewire\Component;
use App\Models\OurTeam;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Services\FileUploadService;

class OurTeamCreate extends Component
{
    use WithFileUploads;

    public $name, $image, $company_role, $facebook_link, $instagram_link, $linkedin_link;

    public function render()
    {
        return view('livewire.our-team.our-team-create')->title('Our Team Create');
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('our_teams', 'name')->whereNull('deleted_at')],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'company_role' => 'required',
        ]);

        $imageName = FileUploadService::uploadFileOnPublic($this->image,'uploads/ourTeam/');

        OurTeam::create([
            "name" => $this->name,
            'image' => $imageName,
            'company_role' => $this->company_role,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'linkedin_link' => $this->linkedin_link
        ]);

        // for notifaction
        session()->flash('message', 'New Our Team Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('our-team.index');
    }
}
