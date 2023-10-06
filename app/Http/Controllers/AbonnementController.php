<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    //Afficher la liste des forfaits à upgrade
    public function upgrade(){
        $permissions = Permission::all();

        return view('auth.upgrade', compact('permissions'));
    }
}
