<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserIndex extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $itemIdToDelete;

    public function render()
    {
        $users = User::select('id', 'name', 'email')->latest('id')->paginate(10); 
        return view('livewire.users.user-index',compact('users'))->title('Users');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->itemIdToDelete = $id;
    }

    public function deleteItem()
    {
        if(!empty($this->itemIdToDelete)){

            User::findOrFail($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;

            // for notifaction
            session()->flash('message', 'User Has Been Permanently Removed.');
            session()->flash('message_type', 'delete');

            return redirect()->route('users.index');
        }
    }
}
