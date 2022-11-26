<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function login() {
        $this->validate();

        if(Auth::attempt(['email' => $this->email , 'password' => $this->password , 'isAdmin' => 1])){
            request()->session()->regenerate();

            return redirect()->route('admin');
        }

        return redirect()->route('login')->with('error', 'چنین کاربری وجود ندارد.');
    }
}
