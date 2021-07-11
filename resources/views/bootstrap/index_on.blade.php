<?php
if (isset($_GET["typeFilter"]) && $_GET["typeFilter"]=="periodo"){
    $datainicio = date('Y-m-d', strtotime($_GET["datainicio"]));
    $datafinal = date('Y-m-d', strtotime($_GET["datafinal"]));

    $vendas_mes = \App\Models\clientes::select()
        ->join("vendas", "clientes.id", "=", "vendas.cliente")
            ->join("usuarios", "vendas.vendedor", "=", "usuarios.id")
                ->select([
                    "clientes.id",
                    "clientes.cpf",
                    "clientes.nome",
                    \DB::RAW('DATE_FORMAT(date(vendas.data_venda), "%d/%m/%Y") as data_venda'),
                    "usuarios.email" ])->whereBetween('vendas.data_venda', [$datainicio, $datafinal])
        ->get()->toArray();
}  elseif (isset($_GET["typeFilter"]) && $_GET["typeFilter"]=="vendedor") {
    $vendas_mes = \App\Models\clientes::select()
    ->join("vendas", "clientes.id", "=", "vendas.cliente")
        ->join("usuarios", "vendas.vendedor", "=", "usuarios.id")
            ->select([
                "clientes.id",
                "clientes.cpf",
                "clientes.nome",
                \DB::RAW('DATE_FORMAT(date(vendas.data_venda), "%d/%m/%Y") as data_venda'),
                "usuarios.email" ])->where('vendas.vendedor', $_GET["vendedor"])
    ->get()->toArray();
} else {
    $vendas_mes = \App\Models\clientes::select()
    ->join("vendas", "clientes.id", "=", "vendas.cliente")
        ->join("usuarios", "vendas.vendedor", "=", "usuarios.id")
            ->select([
                "clientes.id",
                "clientes.cpf",
                "clientes.nome",
                \DB::RAW('DATE_FORMAT(date(vendas.data_venda), "%d/%m/%Y") as data_venda'),
                "usuarios.email" ])
    ->get()->toArray();
};

/*consultas para interface*/
    $year = date("Y");
    $month = date("m");
    $vendas_realizadas = \App\Models\vendas::select()->whereBetween('data_venda', ["$year-$month-01", "$year-$month-31"])->get()->count();
    $quant_operadores = \App\Models\usuarios::select()->where(["nivel"=>"operador", "active"=>1])->count();
    $list_operadores = \App\Models\usuarios::select("email", "name", "id")->where(["nivel"=>"operador", "active"=>1])->get()->toArray();
/*consultas para interface*/
if (!isset($_GET["pstart"]))
{
    
}
?>
@extends("bootstrap.model")
@section("headmain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('bodymain')
    @switch($_SESSION["ME"]["nivel"])
        @case("administrador")
            <h3>administrador page</h3>
            @include("bootstrap.administrador_page", ["vendas_mes"=>$vendas_mes, 
            "vendas_realizadas"=>$vendas_realizadas,
            "list_operadores"=>$list_operadores])
        @break
        @case("coordenador")
            <h3>Coordenador</h3>
        @break
        @case("backoffice")
            @include("bootstrap.backoffice_page", ["vendas_mes"=>$vendas_mes])
        @break
        @case("operador")
            @include("bootstrap.operador_page")
        @break
    @endswitch
@endsection