<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\Abonnement;
use App\Models\Permission;
use App\Models\User;
use App\Mail\ConfirmationInscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function apropos(){
        return view('apropos');
    }
    
    public function tarif(){
        $permissions = Permission::all();

        return view('tarif', compact('permissions'));
    }

    public function nouscontacter(){
        return view('nouscontacter');
    }

    public function signup_free(){
        return view('signup_free');
    }

    public function signup_free_post(UserPostRequest $request){

        $validated = $request->validated();

        if ($validated){
            // Création d'un abonnement
            $abonnement = new Abonnement();
            $abonnement->nom_abonnement = "Gratuit";
            $abonnement->date_abonnement = NOW();
            $abonnement->tarif_mensuel = 0;
            $abonnement->nombre_jour = 0;
            $abonnement->save(); //Enregistrer l'abonnement de la base de données
            $mon_abonnement = Abonnement::all('id')->last(); //Récupérer le dernier abonnement enregistré
            
            //Création d'un utilisateur
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->role_id = 1;
            $user->permission_id = 2;
            $user->abonnement_id = $mon_abonnement->id;
            $user->save();

            Mail::to($request->email)->send(new ConfirmationInscription($user));

            return redirect()->route('signup_free')->with('status', 'Votre a bien été pris en compte.');

        }
        
        
    }

}
