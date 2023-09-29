<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// Créez une permission à accès total
        DB::table('permissions')->insert([
            'nom_permission' => 'Accès total',
            'nombre_user' => 0,
        ]);

        // Créez un permission à accès gratuit
        DB::table('permissions')->insert([
            'nom_permission' => 'Accès gratuit',
            'nombre_user' => 1,
        ]);

        // Créez un permission à accès prefessionnel
        DB::table('permissions')->insert([
            'nom_permission' => 'Accès Professionnel',
            'nombre_user' => 5,
        ]);

        // Créez un permission à accès entreprise
        DB::table('permissions')->insert([
            'nom_permission' => 'Accès Entreprise',
            'nombre_user' => 25,
        ]);

        // Créez un permission à accès limité
        DB::table('permissions')->insert([
            'nom_permission' => 'Accès limité',
            'nombre_user' => 0,
        ]);

    }
}
