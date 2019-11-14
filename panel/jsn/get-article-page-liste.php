<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];

$mngPage = new \Libs\panel\MngPageArticle();
$articles = $mngPage->getPargeArticle();

if ($articles){
    $result["success"] = true;
    $result["msg"] = count($articles)." article(s) trouvé(s)";
    $result["donnees"] = $articles;
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}

echo json_encode($result);