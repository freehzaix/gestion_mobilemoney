<?php

namespace App\Http\Controllers;

use App\Models\Operateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    //Afficher le formulaire pour modifier un opérateur
    public function show($id){
        $operateur = Operateur::find($id);
        return view('auth.operateur.show', compact('operateur'));
    }

    //Modifier un oprérateur en Post
    public function update(Request $request){
        $operateur = Operateur::find($request->id);
        $operateur->nom_operateur = $request->nom_operateur;

        //Ancien fichier
        $ancienFichier = $operateur->url_operateur;
        //Remplacer "storage" par "public"
        $ancienFichier = str_replace('storage', 'public', $ancienFichier);
        if($ancienFichier && Storage::exists($ancienFichier)){
            Storage::delete($ancienFichier);
        }
        //Stocké l'image dans la variable $path dans
        //le répertoire /storage/public/images
        //et créer un lien du repertoire storage vers public
        $path = $request->file('url_operateur')->store('public/images_operateur');
        //Rétirer le repertoire public avant de mettre dans la base de données
        $replace_path = str_replace('public', 'storage', $path);
        //ajouter le repertoire "storage" pour l'insertion de la base de données
        $operateur->url_operateur = $replace_path;    
        $operateur->update();

        return redirect()->route('operateur.index')->with('status', 'L\'opérateur a bien été modifié.');
    }

    //Supprimer un opérateur en Post
    public function delete($id){
        $operateur = Operateur::find($id);
        //Ancien fichier
        $ancienFichier = $operateur->url_operateur;
        //Remplacer "storage" par "public"
        $ancienFichier = str_replace('storage', 'public', $ancienFichier);
        if($ancienFichier && Storage::exists($ancienFichier)){
            Storage::delete($ancienFichier);
        }
        $operateur->delete();
        return redirect()->route('operateur.index')->with('status', 'L\'opérateur a bien été supprimé.');
    }

}
