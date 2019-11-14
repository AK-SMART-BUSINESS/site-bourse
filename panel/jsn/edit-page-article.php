<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];
if (isset($_POST) && !empty($_POST)){
    extract($_POST);
    $mngPage = new \Libs\panel\MngPageArticle();
    $article = new \Libs\panel\PageArticle($page, $contenu, $etat);

    if ($mngPage->updatePageArticle($article, intval($id))){
        $result["success"] = true;
        $result["msg"] = "Article modifié";
        $result["donnees"] = [];
    }else{
        $result["success"] = false;
        $result["msg"] = "Echéc de la modification";
        $result["donnees"] = [$mngPage->getMsgErr()];
    }
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}
//$result["msg"] = "Pas de données soumise";
echo json_encode($result);