<?php
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__DIR__)."/vendor/autoload.php";
session_start();

$result = array();

$test = new \Libs\web\MngTest();
$articles = $test->testeDb("SELECT * FROM articles_test");

if ($articles){
    $result['success'] = true;
    $result['msg']  = count($articles).' article(s) trouvé(s)';
    $result['donnees']  = $articles;
    $result['err_msg']  = $test->getMsgErr();
}else{
    $result['success'] = false;
    $result['msg']  = 'Pas d\'article trouvé';
    $result['donnees']  = $test->getMsgErr();
}

echo json_encode($result);