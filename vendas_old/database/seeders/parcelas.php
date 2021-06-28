<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class parcelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('parcelas')->insert(["parcelas"=>"Pagamento à vista"]);
        \DB::table('parcelas')->insert(["parcelas"=> "Entrada R$ 50,00"]);
        \DB::table('parcelas')->insert(["parcelas"=> "12x de R$ 99,90"]);
    }
}
