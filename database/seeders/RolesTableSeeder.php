<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Créez le rôle d'administrateur
        DB::table('roles')->insert([
            'nom_role' => 'Administrateur',
            'slug' => 'admin',
        ]);

        // Créez le rôle d'utilisateur
        DB::table('roles')->insert([
            'nom_role' => 'Utilisateur',
            'slug' => 'user',
        ]);
    }
}
