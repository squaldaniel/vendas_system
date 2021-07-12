<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inputController;
use App\Http\Controllers\authenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(isset($_SESSION["LOGADO"]) and $_SESSION["LOGADO"]=="startsite"){
        $parcelas = \DB::table("parcelas")->get()->toArray();
        $planos = \DB::table("planos")->get()->toArray();
        $dados = [  "planos"=>$planos,
                    "parcelas"=>$parcelas];
        return view('bootstrap.index_on')->with($dados);
    } else {
        return view('bootstrap.index');
    }

})->name("index");


Route::get('login/', function () {
    return view('bootstrap.login');
});
Route::get("logout/", [authenticationController::class, "getOut"]);
Route::get('pdv/', function () {
    $parcelas = \DB::table("parcelas")->get()->toArray();
    $planos = \DB::table("planos")->get();
    $dados = [  "planos"=>$planos,
                "parcelas"=>$parcelas];
    return view('bootstrap.form_venda')->with($dados);
});
Route::get('dashboard/', function () {
    return view('bootstrap.dashboard');
});
Route::post('novavenda/', [inputController::class, "novavenda"]);
Route::post("authentication/", [authenticationController::class, "check"]);
Route::post("admin/cadnewuser/", [inputController::class, "cadnewuser"]);
Route::get("admin/cadastros/", function(){
    return view("bootstrap.form_novousuario");
});