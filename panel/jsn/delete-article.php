<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];
if (isset($_GET) && !empty($_GET)){
    extract($_GET);
    $id_article = intval($a);
    if ($id_article > 0){
        $mngArticle = new \Libs\panel\MngArticles();

        if ($mngArticle->getArticle($id_article)){
            if ($mngArticle->deleteArticle($a)){
                $result["success"] = true;
                $result["msg"] = "Article supprimé.";
                $result["donnees"] = [];
            }else{
                $result["success"] = false;
                $result["msg"] = "Echèc de la suppression";
                $result["donnees"] = [$mngArticle->getMsgErr()];
            }
        }else{
            $result["success"] = false;
            $result["msg"] = "Cet article n'existe pas.";
            $result["donnees"] = [$mngArticle->getMsgErr()];
        }
    }else{
        $result["success"] = false;
        $result["msg"] = "Error ! Invalid parameter.";
        $result["donnees"] = [];
    }
}else{
    $result["success"] = false;
    $result["msg"] = "Pas de données soumise";
    $result["donnees"] = [];
}

echo json_encode($result);