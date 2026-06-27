<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Hash;

class UserEdit extends Component
{

    public $userId;
    public $name, $email, $password, $confirm_password;

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.users.user-edit')->title('Users Edit');
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email," . $this->userId,
            "password" => "nullable|same:confirm_password",
        ]);

        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        // for notifaction
        session()->flash('message', 'User Has Been Updated.');
        session()->flash('message_type', 'update');

        return redirect()->route('users.index');
    }
}
