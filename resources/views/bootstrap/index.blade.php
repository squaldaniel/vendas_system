@extends("bootstrap.model")
@section("headmain")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('bodymain')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <img alt="" height="150" class="hCL kVc L4E MIw" importance="auto" loading="auto" src="assets/img/logo.jpeg">
      <h1 class="display-4 fw-bold lh-1 mb-3">ASPREM</h1>
      <p class="col-lg-10 fs-4">Sistema de vendas</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a  href="pdv/"class="btn btn-primary btn-lg px-4 gap-3">Sou Operador / Coordenador</a>
        <a href="dashboard/" class="btn btn-outline-secondary btn-lg px-4">Dashboard</a>
      </div>
    </div>
    
    <div class="col-md-10 mx-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-light" action="authentication/" method="POST">
        @csrf
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="name@example.com" required>
          <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="passkey" placeholder="Password" required>
          <label for="floatingPassword">Senha</label>
        </div>
        <div class="checkbox mb-3">
        </div>
        <input class="w-100 btn btn-lg btn-primary" type="submit" value="Entrar">
        <hr class="my-4">
        <small class="text-muted">Daniels Hogans © - {{date("Y")}}</small>
      </form>
    </div>
  </div>
</div>

<div class="px-4 py-5 my-5 text-center">
  <img alt="" height="100" class="hCL kVc L4E MIw" importance="auto" loading="auto" src="https://i.pinimg.com/564x/4e/c4/c7/4ec4c781b12eb80157df403d71e6db39.jpg">
  <h1 class="display-5 fw-bold">Sistemas de vendas</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Simples sistema de vendas para demostração. escolha a opção a baixo de acordo com o seu tipo de perfil.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a  href="pdv/"class="btn btn-primary btn-lg px-4 gap-3">Sou Operador / Coordenador</a>
      <a href="dashboard/" class="btn btn-outline-secondary btn-lg px-4">Dashboard</a>
    </div>
  </div>
</div>
@endsection