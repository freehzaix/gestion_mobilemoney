<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    ///Liste des transactions
    public function index(){
        $transactions = Transaction::where('abonnement_id', Auth::user()->abonnement_id)->get();
        $clients = Client::where('abonnement_id', Auth::user()->abonnement_id)->get();
        $caisses = Caisse::where('abonnement_id', Auth::user()->abonnement_id)->get();

        return view('auth.transaction.index', compact('transactions', 'clients', 'caisses'));
    }

    //Formulaire d'ajout d'une transaction
    public function add(){
        $clients = Client::where('abonnement_id', Auth::user()->abonnement_id)->get();
        $caisses = Caisse::where('abonnement_id', Auth::user()->abonnement_id)->get();

        return view('auth.transaction.add', compact('caisses', 'clients'));
    }

    //Traitement du formulaire transaction en Post
    public function add_post(Request $request){
        
        $request->validate([
            'client_id' => 'required',
        ]);

        if($request->type == 'depot'){
            $cai = Caisse::find($request->caisse_id);
            $cai->montant_caisse = ($cai->montant_caisse + $request->montant + $request->frais);
            $cai->update();
        }else if($request->type == 'retrait'){
            $cai = Caisse::find($request->caisse_id);
            $cai->montant_caisse = ($cai->montant_caisse - $request->montant - $request->frais);
            $cai->update();
        }

        $transaction = new Transaction();
        $transaction->montant = $request->montant;
        $transaction->details = $request->details;
        $transaction->type = $request->type;
        $transaction->frais = $request->frais;
        $transaction->dateHeure = NOW();
        $transaction->client_id = $request->client_id;
        $transaction->caisse_id = $request->caisse_id;
        $transaction->abonnement_id = Auth::user()->abonnement_id;
        $transaction->save();

        return redirect()->route('transaction.index')->with('status', 'La transaction a bien été créée avec son numéro de téléphone.');

    }

    //Afficher le formulaire pour modifier une transaction
    public function show($id){
        $transaction = Transaction::find($id);
        return view('auth.transaction.show', compact('transaction'));
    }

    //Modifier la transaction en Post
    public function update(Request $request){
        $transaction = Transaction::find($request->id);
        $transaction->montant = $request->montant;
        $transaction->details = $request->details;
        $transaction->update();

        return redirect()->route('transaction.index')->with('status', 'La transaction a bien été modifiée.');
    }

    //Supprimer une transaction
    public function delete($id){
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('status', 'La transaction a bien été supprimée.');
    }
    
}
