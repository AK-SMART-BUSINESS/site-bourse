<?php
define("URL", str_replace("index.php", "",
    (isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once dirname(__DIR__)."/vendor/autoload.php";
session_start();
$app = new \Libs\panel\Application();
$app->run();