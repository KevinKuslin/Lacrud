<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'login-name' => 'required', 
            'login-password' => 'required'
        ]); 
        if(auth()->attempt(['name' => $incomingFields['login-name'], 'password' => $incomingFields['login-password']])){
            $request->session()->regenerate(); 
        }
        return redirect('/'); 
    }
    
    public function logout(){
        auth()->logout(); 
        return redirect('/'); 
    } 

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:5', Rule::unique('users', 'name')],  
            'email' => ['required', 'email', Rule::unique('users', 'email')], 
            'password' => ['required', 'min:3', 'max:5']     
        ]); 
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields); // simpan ke database dan $user megambil objek user 
        auth()->login($user); 
        return redirect('/'); 
    }
}
