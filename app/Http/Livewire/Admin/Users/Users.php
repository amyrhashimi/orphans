<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;
    public $queryString = ['paginate', 'search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::latest();

        if($this->search !== null){
            $users = $users->where('name', 'like', '%' . $this->search . '%');
        }
        $users = $users->paginate($this->paginate);

        return view('livewire.admin.users.users', compact('users'))->layout('layouts.master');
    }

    public function new() {
        return redirect()->route('users.create');
    }

    public function children()
    {
        return redirect()->route('users.children');
    }

    public function edit($id)
    {
        return redirect()->route('users.edit', $id);
    }

    public function destroy($user)
    {
        // delete user
    }
}
