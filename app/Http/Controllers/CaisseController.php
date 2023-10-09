<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Operateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaisseController extends Controller
{
    ///Liste des caisses
    public function index(){
        $caisses = Caisse::where('abonnement_id', Auth::user()->abonnement_id)->get();
        return view('auth.caisse.index', compact('caisses'));
    }

    //Formulaire d'ajout d'une caisse
    public function add(){
        $operateur = Operateur::where('abonnement_id', Auth::user()->abonnement_id)->get();
        return view('auth.caisse.add', compact('operateur'));
    }

    //Traitement du formulaire caisse en Post
    public function add_post(Request $request){
        
        $request->validate([
            'nom_caisse' => 'required',
            'montant_caisse' => 'required',
            'taux_caisse' => 'required',
            'operateur_id' => 'required|unique:caisses',
        ]);

        $caisse = new Caisse();
        $caisse->nom_caisse = $request->nom_caisse;
        $caisse->montant_caisse = $request->montant_caisse;
        $caisse->taux_caisse = $request->taux_caisse;
        $caisse->operateur_id = $request->operateur_id;
        $caisse->abonnement_id = Auth::user()->abonnement_id;
        $caisse->save();

        return redirect()->route('caisse.index')->with('status', 'La caisse a bien été créée.');

    }

    //Afficher le formulaire pour modifier une caisse
    public function show($id){
        $caisse = Caisse::find($id);
        return view('auth.caisse.show', compact('caisse'));
    }

    //Modifier la caisse en Post
    public function update(Request $request){
        $caisse = Caisse::find($request->id);
        $caisse->nom_caisse = $request->nom_caisse;
        $caisse->montant_caisse = $request->montant_caisse;
        $caisse->taux_caisse = $request->taux_caisse;
        $caisse->operateur_id = $request->operateur_id;
        $caisse->update();

        return redirect()->route('caisse.index')->with('status', 'La caisse a bien été modifiée.');
    }

    //Supprimer une caisse
    public function delete($id){
        $caisse = Caisse::find($id);
        $caisse->delete();

        return redirect()->route('caisse.index')->with('status', 'La caisse a bien été supprimée.');
    }
    
}
