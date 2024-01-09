<?php

namespace App\Livewire\Auth;





use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component

{
    public $data = [
        'email'=>"",
        'password'=>"",
        'password_confirmation'=>'',
        'fullName'=>'',
        'policy'=>false,
    ];

    public function saveRegister(){
        $this->validate([
            'data.fullName'=>'required',
            'data.email' => 'email:rfc,dns |required ',
            'data.password' => 'string |min:4 |required |confirmed',
            'data.policy'=>'required'
        ]);



        $user = new User;
        $user->name = $this->data['fullName'];
        $user->email = $this->data['email'];
        $user->password = Hash::make($this->data['password']);
        $user->save();

        $id = $user->id;
        Auth::loginUsingId($id);

        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
