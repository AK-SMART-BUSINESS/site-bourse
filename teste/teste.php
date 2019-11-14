<?php
require_once "../vendor/autoload.php";
$dsn = "mysql:host=localhost;dbname=gitcicom_suivi;charset=UTF8";
$user = "gitcicom_svusr";
$pass = "cGyS.~JDSf&A";
try {
  $db = new \PDO($dsn,$user,$pass);
  $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

  if ($db) {
    echo "Connexion ok";
  } else {
    echo "Oups!";
  }

} catch (\PDOException $e) {
  die($e->getMessage());
}
