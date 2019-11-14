<?php
header('Content-Type: application/json; charset=UTF-8');
require_once dirname(dirname(__DIR__))."/vendor/autoload.php";
session_start();

$result = [];
if (isset($_GET) && !empty($_GET)){
    extract($_GET);
    $id_article = intval($a);
    if ($id_article > 0){
        $mngArticle = new \Libs\panel\MngPageArticle();

        if ($mngArticle->getPargeArticleById($id_article)){
            if (isset($en) && $en == true){
                if ($mngArticle->enabledArticle($id_article)){
                    $result["success"] = true;
                    $result["msg"] = "Article publié";
                    $result["donnees"] = [];
                }else{
                    $result["success"] = false;
                    $result["msg"] = "Echèc de la publication de cet article";
                    $result["donnees"] = [$mngArticle->getMsgErr()];
                }
            }else if (isset($ds) && $ds == true){
                if ($mngArticle->disabledArticle($id_article)){
                    $result["success"] = true;
                    $result["msg"] = "Cet article n'est plus publié";
                    $result["donnees"] = [$mngArticle->getMsgErr().' '.$id_article];
                }else{
                    $result["success"] = false;
                    $result["msg"] = "Echèc de la publication de cet article";
                    $result["donnees"] = [$mngArticle->getMsgErr()];
                }
            }else{
                $result["success"] = false;
                $result["msg"] = "Error ! Invalid parameter.";
                $result["donnees"] = [];
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