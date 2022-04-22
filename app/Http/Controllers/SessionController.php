<?php

namespace App\Http\Controllers;

use App\View\Components\auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{

    public function create(){
        return view("authPages/login");
    }

    public function store(){
            $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('succes', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'The email addres is incorrect!'
        ]);
 
    }

   public function destroy(){
       auth()->logout();
       return redirect('/')->with('succes', 'Goodbye!');
   }
}
