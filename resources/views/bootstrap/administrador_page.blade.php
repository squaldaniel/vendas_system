@php

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

$meses = [
    1=>"Janeiro",
    2=>"Fevereiro",
    3=>"Março",
    4=>"Abril",
    5=>"Maio",
    6=>"Junho",
    7=>"Julho",
    8=>"Agosto",
    9=>"Setembro",
    10=>"Outubro",
    11=>"Novembro",
    12=>"Dezembro"
];
@endphp
@section("headmain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
{{-- datepicker --}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css"  />

@endsection
@section("bodymain")
<nav class="navbar navbar-expand-lg text text-white navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="operadoreslist" data-bs-toggle="dropdown" aria-expanded="false">
              @if ($quant_operadores != 0)
              ({{$quant_operadores}})
              @endif
               <span class="fa fa-users" aria-hidden="true"></span> Operadores /Cadastros</a>
            <ul class="dropdown-menu" aria-labelledby="operadoreslist">
              <li><a class="dropdown-item" href="http://{{$_SERVER["HTTP_HOST"]}}/admin/cadastros/"><span class="fa fa-user-plus"></span> Cadastrar </a></li>
              <li><hr class="dropdown-divider"></li>
              @foreach($list_operadores as $key=>$value)
            <li><a class="dropdown-item" href="admin/operador/{{$value["id"]}}">{{$value["name"]}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="operadoreslist" data-bs-toggle="dropdown" aria-expanded="false">
              @if ($vendas_realizadas != 0)
              ({{$vendas_realizadas}})
              @endif
              <span class="fa fa-cart-arrow-down" aria-hidden="true"></span> vendas no mês</a>
            <ul class="dropdown-menu" aria-labelledby="operadoreslist">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modelperiodo">Filtrar Período</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modelvendedor">Filtrar por vendedor</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Usuário</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown08">
              {{-- <li><a class="dropdown-item" href="#">trocar Senha</a></li> --}}
              <li><a class="dropdown-item" href="logout/">Sair</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
    <div class="row" style="margin-top: 10px">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <td>CPF</td>
              <td>Nome cliente</td>
              <td>Data Venda</td>
              <td>Vendedor</td>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas_mes as $key=>$value)
            <tr><td>{{$value["cpf"]}}</td>
                <td>{{$value["nome"]}}</td>
                <td>{{$value["data_venda"]}}</td>
                <td>{{$value["email"]}}</td></tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelperiodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filtrar por período</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="get">
          <div class="mb-4 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Data inicio:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control datepicker" name="datainicio" >
            </div>
          </div>
          <div class="mb-4 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Data final:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control datepicker" name="datafinal">
            </div>
          </div>
          <input type="hidden" name="typeFilter" value="periodo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelvendedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filtrar por vendedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="get">
          <div class="mb-4 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Vendedor:</label>
            <div class="col-sm-8">
              <select name="vendedor" class="form-select">
                @foreach($list_operadores as $key=>$value)
                  <option value="{{$value["id"]}}">{{$value["name"]}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <input type="hidden" name="typeFilter" value="vendedor">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
      </div>
    </form>
    </div>
  </div>
</div>

    
@endsection
@section("footermain")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script type="text/javascript">
$('#cep').mask('00000-000');
$('#cpf_resp, #cpf_c').mask('000.000.000-00', {reverse: true});
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR'
});
</script>
@endsection