<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];

$mngArticle = new \Libs\panel\MngArticles();
$articles = $mngArticle->getArticles();

if ($articles){
    $result["success"] = true;
    $result["msg"] = count($articles)." article(s) trouvé(s)";
    $result["donnees"] = $articles;
}else{
    $result["success"] = false;
    $result["msg"] = "Pas d'article trouvé";
    $result["donnees"] = [];
}

echo json_encode($result);