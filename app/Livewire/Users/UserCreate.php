<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name, $email, $password, $confirm_password;

    public function render()
    {
        return view('livewire.users.user-create')->title('Users Create');
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|same:confirm_password|min:6",
        ]);

        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password),
        ]);

        // for notifaction
        session()->flash('message', 'New User Has Been Added.');
        session()->flash('message_type', 'create');

        return redirect()->route('users.index');
    }
}
