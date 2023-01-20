<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function userRegister(Request $request){
        try{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            $user->assignRole('Editor');

            return redirect()->route('home')->with('signup_message', 'successfully registrered.');
        }catch(Exception $e){
            return redirect()->route('home')->with('signup_message', 'registration failed.');
        }
    
        
    }

    public function userLogin(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($validatedData)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('login_message', 'login failed')->withErrors(['Invalid email or password']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
