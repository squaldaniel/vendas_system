<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    public $fillable = [
        "cliente",
        "vendedor",
        "data_venda"
    ];
}
