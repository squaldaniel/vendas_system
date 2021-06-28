<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    public $fillable = [
        "cpf",
        "nome",
        "nascimento",
        "nome_responsavel",
        "cpf_responsavel",
        "nascimento_responsavel",
        "data_cadastro",
        "cep",
        "endereco",
        "bairro",
        "numero",
        "fone_fixo",
        "fone_celular",
        "plano",
        "parcelas_plano",
        "material",
        "parcelas_material",
        "cadastrado_por"
    ];
}
