<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password'=> 'required'
        ]);
        if (Auth::attempt([
            'email'=>$this->email,
            'password'=>$this->password
        ],$this->remember)){
            return redirect()->to('/');
        }
        return to_route('login')
            ->with('error',"اطلاعات وارد شده صحیح نمی باشد") ;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
