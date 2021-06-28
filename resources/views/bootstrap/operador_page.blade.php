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
$vendas_realizadas = \App\Models\vendas::where("vendedor", "=", $_SESSION["ME"]["id"])->get()->count();
@endphp
@section("headmain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

@endsection
@section("bodymain")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><span class="fa fa-cart-arrow-down" aria-hidden="true"></span> Vendas <span class="badge bg-secondary">{{$vendas_realizadas}}</span></a>
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
    <fieldset>
        <legend>Cadastro de vendas</legend>
        <form action="novavenda/" method="POST">
            @csrf
        <div class="col-md-8">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-cliente-tab" data-bs-toggle="tab" data-bs-target="#nav-cliente" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><span class="fa fa-user"></span> Cliente</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="fa fa-user-circle-o"></span> Responsável</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="fa fa-cart-arrow-down fa-2" aria-hidden="true"></span> Plano / Produto</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-cliente" role="tabpanel" aria-labelledby="nav-cliente-tab">
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Nome :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nome" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">CPF :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="cpf" id="cpf_c" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Nascimento :</label>
                        <div class="col-sm-2">
                            <select class="form-select" name="dia_c" require>
                                @for ($i = 1; $i <= 31; $i++)
                                    @if(strlen($i) < 2)
                                        <option value="{{$i}}">{{'0'.$i}}</option>
                                        @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                    </div>
                    <div class="col-sm-2">
                            <select class="form-select" name="mes_c" require>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{$m}}">{{$meses[$m]}}</option>
                                @endfor
                            </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" name="ano_c" require>
                            @for ($y = (intval(date("Y"))-100); $y <= intval(date("Y")); $y++)
                                <option value="{{$y}}">{{$y}}</option>
                            @endfor
                        </select>
                    </div>
                    </div>

                </div>
                
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Responsavel :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="responsavel" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">CPF Resp.:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="cpf_responsavel" id="cpf_resp" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Nasc. Resp.:</label>
                        <div class="col-sm-2">
                            <select class="form-select" name="dia_r" require>
                                @for ($i = 1; $i <= 31; $i++)
                                    @if(strlen($i) < 2)
                                        <option value="{{$i}}">{{'0'.$i}}</option>
                                        @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                    </div>
                    <div class="col-sm-2">
                            <select class="form-select" name="mes_r" require>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{$m}}">{{$meses[$m]}}</option>
                                @endfor
                            </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" name="ano_r" require>
                            @for ($y = (intval(date("Y"))-100); $y <= intval(date("Y")); $y++)
                                <option value="{{$y}}">{{$y}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Cep :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="cep" id="cep" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Endereço :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="endereco" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Bairro :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="bairro" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Número :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="numero" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Fone fixo :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="fone_fixo" require>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Celular :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="celular" require>
                        </div>
                    </div>

                    </div>

                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Plano :</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="plano" require>
                                @foreach($planos as $key=>$plano)
                                <option value="{{$plano->id}}"> {{$plano->nome_plano}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Parcelas :</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="parcelas_plano" require>
                                @foreach($parcelas as $key=>$parcela)
                                <option value="{{$parcela->id}}"> {{$parcela->parcelas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Material :</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="material" require>
                                @foreach($planos as $key=>$plano)
                                <option value="{{$plano->id}}"> {{$plano->nome_plano}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Parcelas :</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="parcelas_material" require>
                                @foreach($parcelas as $key=>$parcela)
                                <option value="{{$parcela->id}}"> {{$parcela->parcelas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
              </div>

            
            
            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <input type="reset" class="btn btn-warning" value="Limpar">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </div>
        </div>
        </form>
    </fieldset>
</div>
@endsection
@section("footermain")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$('#cep').mask('00000-000');
$('#cpf_resp, #cpf_c').mask('000.000.000-00', {reverse: true});
</script>
@endsection