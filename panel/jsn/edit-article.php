<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];
if (isset($_POST) && !empty($_POST)){
    extract($_POST);
    $mngArticle = new \Libs\panel\MngArticles();
    $article = new \Libs\panel\Article($titre, $contenu, $etat);

    if ($mngArticle->updateArticle($article, $id)){
        $result["success"] = true;
        $result["msg"] = "Article modifié";
        $result["donnees"] = [];
    }else{
        $result["success"] = false;
        $result["msg"] = "Echéc de la modification";
        $result["donnees"] = [$mngArticle->getMsgErr()];
    }
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}

echo json_encode($result);