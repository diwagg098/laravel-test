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

    public function login()
    {
        $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->to('/home');
        } else {
            session()->flash('error', 'Invalid Credential');
            return redirect('/login');
        }
    }
}
