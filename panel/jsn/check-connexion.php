<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];

if (\App\Session::sessionExist()){
    $result["success"] = true;
    $result["msg"] = "Utilisateur connecté.";
    $result["donnees"] = [];
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de connexion existante.";
    $result["donnees"] = [];
}

echo json_encode($result);