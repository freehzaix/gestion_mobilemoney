<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Afficher la vue login
    public function login(){
        return view('auth.login');
    }

    //Traitement en post de login
    public function login_post(Request $request): RedirectResponse{

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Adresse mail incorrect.',
            'password' => 'Mot de passe incorrect.',
        ])->onlyInput('email', 'password');
        
    }

    //Afficher la vue dashboard
    public function dashboard(){
        return view('auth.dashboard');
    }
}
