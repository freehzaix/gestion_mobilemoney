<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    ///Liste des client
    public function index(){
        $clients = Client::where('abonnement_id', Auth::user()->abonnement_id)->get();
        return view('auth.client.index', compact('clients'));
    }

    //Formulaire d'ajout d'un client
    public function add(){
        return view('auth.client.add');
    }

    //Traitement du formulaire client en Post
    public function add_post(Request $request){
        
        $request->validate([
            'telephone' => 'required|unique:clients',
        ]);

        $client = new Client();
        $client->telephone = $request->telephone;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->pays = $request->pays;
        $client->abonnement_id = Auth::user()->abonnement_id;
        $client->save();

        return redirect()->route('client.index')->with('status', 'Le client a bien été créée avec son numéro de téléphone.');

    }

    //Afficher le formulaire pour modifier un client
    public function show($id){
        $client = Client::find($id);
        return view('auth.client.show', compact('client'));
    }

    //Modifier le client en Post
    public function update(Request $request){
        $client = Client::find($request->id);
        $client->telephone = $request->telephone;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->pays = $request->pays;
        $client->update();

        return redirect()->route('client.index')->with('status', 'Le client a bien été modifiée.');
    }

    //Supprimer un client
    public function delete($id){
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('client.index')->with('status', 'Le client a bien été supprimée.');
    }
    
}
