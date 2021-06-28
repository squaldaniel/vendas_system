<?php
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
//print_r($parcelas);
//print_r($planos);
?>
@extends("bootstrap.model")
@section("headmain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section("bodymain")
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
                          <input type="text" class="form-control" name="cpf" require>
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
                          <input type="text" class="form-control" name="cpf_responsavel" require>
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

                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label">Cep :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="cep" require>
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
                        <div class="col-sm-2">
                            <select class="form-select" name="plano" require>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Parcelas :</label>
                        <div class="col-sm-2">
                            <select class="form-select" name="parcelas_plano" require>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Material :</label>
                        <div class="col-sm-2">
                            <select class="form-select" name="material" require>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="margin-top: 10px">
                        <label  class="col-sm-2 col-form-label">Parcelas :</label>
                        <div class="col-sm-2">
                            <select class="form-select" name="parcelas_material" require>
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
