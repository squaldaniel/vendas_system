<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\authenticationController;
use App\Models\clientes;
use App\Models\vendas;
use App\Models\usuarios;


class inputController extends Controller
{
    public static function novavenda()
    {
        $insert["nome"] = $_POST["nome"];
        $insert["cpf"] = str_replace(["-", "."], "", $_POST["cpf"]);
        $insert["nasc_c"] = $_POST["ano_c"].'-'.$_POST["mes_c"].'-'.$_POST["dia_c"];
        $insert["responsavel"] = $_POST["responsavel"];
        $insert["cpf_responsavel"] = str_replace(["-", "."], "", $_POST["cpf_responsavel"]);
        $insert["nasc_responsavel"] = $_POST["ano_r"].'-'.$_POST["mes_r"].'-'.$_POST["dia_r"];
        $insert["cep"] = str_replace("-", "", $_POST["cep"]);
        $insert["endereco"] = $_POST["endereco"];
        $insert["bairro"] = $_POST["bairro"];
        $insert["numero"]= $_POST["numero"];
        $insert["fone_fixo"]= $_POST["fone_fixo"];
        $insert["celular"]= $_POST["celular"];
        $insert["plano_produto"] = $_POST["plano"];
        $insert["material"] = $_POST["material"];
        $insert["parcela_plano"] = $_POST["parcelas_plano"];
        $insert["parcela_material"] = $_POST["parcelas_material"];
        
        $cliente = new clientes;
            $cliente->cpf = $insert["cpf"];
            $cliente->nome = $insert["nome"];
            $cliente->nascimento = $insert["nasc_c"];
            $cliente->nome_responsavel = $insert["responsavel"];
            $cliente->cpf_responsavel = $insert["cpf_responsavel"];
            $cliente->nascimento_responsavel = $insert["nasc_responsavel"];
            $cliente->cep = $insert["cep"];
            $cliente->endereco = $insert["endereco"];
            $cliente->bairro = $insert["bairro"];
            $cliente->numero = $insert["numero"];
            $cliente->fone_fixo = $insert["fone_fixo"];
            $cliente->fone_celular = $insert["celular"];
            $cliente->plano = $insert["plano_produto"];
            $cliente->parcelas_plano = $insert["parcela_plano"];
            $cliente->material = $insert["material"];
            $cliente->parcelas_material = $insert["parcela_material"];
            $cliente->cadastrado_por = $_SESSION["ME"]["id"];
            $cliente->data_cadastro = date("Y-m-d");    
        $cliente->save();
        $venda = new vendas;
            $venda->vendedor = $_SESSION["ME"]["id"];
            $venda->cliente = $cliente->id;
            $venda->data_venda = date("Y-m-d");
            $venda->save();
            return redirect()->route("index");
    }
    public function cadnewuser(Request $request)
    {
        echo "novo operador";
        $usuario = new usuarios;
        $usuario->name = $request->input("nome");
        $usuario->email = $request->input("email");
        $usuario->password = authenticationController::makehash($request->input("email"));
        $usuario->nivel = $request->input("nivel");
        $usuario->active = $request->input("ativo");
        $usuario->save();
        return redirect()->route("index");
    }
}
