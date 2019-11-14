<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];
if (isset($_POST) && !empty($_POST)){
    extract($_POST);
    $mngPage = new \Libs\panel\MngPageArticle();
    $article = new \Libs\panel\PageArticle(\App\App::secure($page),$contenu,$etat);
    if ($mngPage->getPargeArticleByPage(\App\App::secure($page))){
        $result["success"] = false;
        $result["msg"] = "Vous avez déjà effectué cet enregistrement";
        $result["donnees"] = [$mngPage->getMsgErr()];
    }else{
        if ($mngPage->addPargeArticle($article)){
            $result["success"] = true;
            $result["msg"] = "Article de page enregistré";
            $result["donnees"] = [];
        }else{
            $result["success"] = false;
            $result["msg"] = "Echéc de l'enregistrement";
            $result["donnees"] = [$mngPage->getMsgErr()];
        }
    }
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}

echo json_encode($result);