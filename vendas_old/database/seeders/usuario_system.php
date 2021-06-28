<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\authenticationController;

class usuario_system extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios')->insert([
            'email' => "daniel.santos.ap@gmail.com",
            'active' => 1,
            'nivel' => "administrador",
            "password" => authenticationController::makehash('1a2b3c')
        ]);
        \DB::table('usuarios')->insert([
            'email' => "root",
            'active' => 1,
            'nivel' => "administrador",
            "password" => authenticationController::makehash('1a2b3c')
        ]);
    }
}
