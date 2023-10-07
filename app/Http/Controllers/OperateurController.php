<?php

namespace App\Http\Controllers;

use App\Models\Operateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperateurController extends Controller
{
    //Liste des opérateurs réseaux
    public function index(){
        $operateurs = Operateur::where('abonnement_id', Auth::user()->abonnement_id)->get();
        
        return view('auth.operateur.index', compact('operateurs'));
    }

    //Formulaire d'ajout d'un opérateur réseaux
    public function add(){
        return view('auth.operateur.add');
    }

    //Traitement du formulaire opérateur réseau en Post
    public function add_post(Request $request){
        $operateur = new Operateur();
        $operateur->nom_operateur = $request->nom_operateur;
        $operateur->abonnement_id = Auth::user()->abonnement_id;

        //Stocké l'image dans la variable $path dans
        //le répertoire /storage/public/images
        //et créer un lien du repertoire storage vers public
        $path = $request->file('url_operateur')->store('public/images_operateur');
        //Rétirer le repertoire public avant de mettre dans la base de données
        $replace_path = str_replace('public', 'storage', $path);
        //ajouter le repertoire "storage" pour l'insertion de la base de données
        $operateur->url_operateur = $replace_path;            
        $operateur->save();

        return redirect()->route('operateur.index')->with('status', 'Un opérateur a été ajouté.');

    }

}
