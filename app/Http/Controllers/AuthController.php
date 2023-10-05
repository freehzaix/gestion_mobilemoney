<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    //Mise à jour du profil dans la base de données
    public function monprofil_update(Request $request){
        $user = User::find(Auth::user()->id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->adresse = $request->adresse;
        $user->telephone = $request->telephone;
        $user->ville = $request->ville;
        $user->pays = $request->pays;
        $user->update();
        return redirect()->route('monprofil')->with('status', 'Vos informations ont bien été mise à jours.');
    }

    //Afficher l'interface de suppression du compte
    public function supprimermoncompte(){
        return view('auth.supprimermoncompte');
    }

    //Modifier image de profil
    public function modifierimageprofil(Request $request) {
        $user = User::find(Auth::user()->id); //Récupéré l'utilisateur connecté
        
        $ancienFichier = Auth::user()->image_profil;
        //On va remplacer le repertoire "storage" par "public" concernant
        //l'ancien fichier image de profil
        $ancienFichier = str_replace('storage/', 'public/', $ancienFichier);
        
        if ($ancienFichier && Storage::exists($ancienFichier)) {
            Storage::delete($ancienFichier);
        }

        //Stocké l'image dans la variable $path dans
        //le répertoire /storage/public/images
        //et créer un lien du repertoire storage vers public
        $path = $request->file('image_profil')->store('public/images');
        //Rétirer le repertoire public avant de mettre dans la base de données
        $replace_path = str_replace('public', '', $path); 
        //ajouter le repertoire "storage" pour l'insertion de la base de données
        $user->image_profil = "storage". $replace_path;            
        $user->update();

        //Après avoir enregistrer, faire la rediretion
        return redirect()->route('monprofil')->with('status', 'L\'image '.$replace_path.' a été bien enregistré.');
       
    }

}
