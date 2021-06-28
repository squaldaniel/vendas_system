<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class planos_produtos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('planos')->insert(["nome_plano"=>"Curso ASPREM"]);
        \DB::table('planos')->insert(["nome_plano"=>"Matrerial Didático"]);
    }
}
