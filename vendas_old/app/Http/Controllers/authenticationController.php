<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authenticationController extends Controller
{
    public function check()
    {
        $usuario = $_POST["usuario"];
        $passkey = self::makehash($_POST["passkey"]);
        $exists = json_decode(json_encode(\DB::table("usuarios")->select(
            \DB::RAW("count(*) as existe"))->where(
                ["email"=> $usuario,
                "password"=>$passkey,
                "active"=>true])->get()->toArray()), JSON_UNESCAPED_SLASHES);
        if($exists[0]["existe"]==1){
                    $usuario = \DB::table("usuarios")->where(
                            ["email"=> $usuario,
                            "password"=>$passkey,
                            "active"=>true])->get()->toarray();
        $_SESSION["LOGADO"] = "startsite";
        $_SESSION["ME"]["email"] = $usuario[0]->email;
        $_SESSION["ME"]["nivel"] = $usuario[0]->nivel;
        $_SESSION["ME"]["id"] = $usuario[0]->id;
        //print_r($usuario);
        //print_r($_SESSION);
        return redirect()->route("index");
                } else {
                    echo "não pode logar";
                };
    }
    public static function makehash($string)
    {
        $hash_string = "hogans_daniels_tecnology";
        $string  = md5(sha1($hash_string.$string).$hash_string);
        $hash = base64_encode($string);
        return $hash;
    }
    public static function queryLogin()
    {
        $exists = json_decode(json_encode(\DB::table("usuarios")->select(
            \DB::RAW("count(*) as existe"))->where(
                ["email"=> $usuario,
                "password"=>$passkey,
                "active"=>true])->get()->toArray()), JSON_UNESCAPED_SLASHES);
    }
    public static function getOut()
    {
        session_destroy();
        unset($_SESSION);
        return redirect()->route("index");
    }
}
