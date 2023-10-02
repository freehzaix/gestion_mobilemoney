<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
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
        if(Auth::check()){
            return view('auth.dashboard');
        }else{
            return redirect()->route('login');
        } 
    }

    //Fonction pour se déconnecter
    public function logout(Request $request): RedirectResponse{
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }

    //Afficher les informations sur l'abonnement en cours
    public function abonnement(){
        $abonnement = Abonnement::find(Auth::user()->abonnement_id);
        return view('auth.abonnement', compact('abonnement'));
    }

    //Afficher les informations sur le profil utilisateur connecté
    public function monprofil(){
        return view('auth.monprofil');
    }

}
