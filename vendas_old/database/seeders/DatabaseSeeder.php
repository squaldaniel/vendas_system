<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usuario_system::class);
        $this->call(planos_produtos::class);
        $this->call(parcelas::class);
    }
}
