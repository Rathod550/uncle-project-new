<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Blog;
use App\Models\Post;

class Dashboard extends Component
{
    public function render()
    {
        $usersCount = User::count();
        
        return view('livewire.dashboard', compact(
            'usersCount',
        ))->title('Dashboard');
    }
}
