<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperateurController extends Controller
{
    //Liste des opérateurs réseaux
    public function index(){
        return view('auth.operateur.index');
    }

    //Formulaire d'ajout d'un opérateur réseaux
    public function add(){
        return view('auth.operateur.add');
    }

}
