<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class Children extends Component
{
    public function render()
    {
        return view('livewire.admin.users.children')->layout('layouts.master');
    }
}
