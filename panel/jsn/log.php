<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];

if (isset($_POST) && !empty($_POST)){
    $usr = new \Libs\panel\MngUsers();
    if ($usr->connectUser(\App\App::secure($_POST['email']), $_POST['passe'])){
        $result["success"] = True;
        $result["msg"] = "<b>Accès autorisé ! </b><br />Vous êtes connecté.";
        $result["donnees"] = [];
    }else{
        $result["success"] = false;
        $result["msg"] = "<b>Echèc de la connexion !</b><br />Identifiant ou mot de passe incorrecte.";
        $result["donnees"] = [$usr->getMsgErr()];
    }
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}

echo json_encode($result);