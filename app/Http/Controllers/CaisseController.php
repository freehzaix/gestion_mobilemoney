<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaisseController extends Controller
{
    ///Liste des caisses
    public function index(){
        return view('auth.caisse.index');
    }

}
