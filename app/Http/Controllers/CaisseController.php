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

}
