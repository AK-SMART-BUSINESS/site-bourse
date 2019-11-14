<?php
/**
 * Connexion à la base de donnée
 * Ajouter les fonctions basiques
 */
session_start();
$err_msg = "";

function db()
{
  // $dsn = "mysql:host=localhost;dbname=gitcicom_suivi;charset=UTF8";
  // $user = "gitcicom_svusr";
  // $pass = "cGyS.~JDSf&A";

  $dsn = "mysql:host=localhost;dbname=git_suivi;charset=UTF8";
  $user = "root";
  $pass = "";

  try {
    $dbh = new PDO($dsn,$user,$pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $dbh;
  } catch (PDOException $e) {
    $GLOBALS["err_msg"] = $e->getMessage();
    die();
  }
}

function db2()
{
  // $dsn = "mysql:host=localhost;dbname=gitcicom_intra;charset=UTF8";
  // $user = "gitcicom_svusr";
  // $pass = "cGyS.~JDSf&A";

  $dsn = "mysql:host=localhost;dbname=gitcicom_intra;charset=UTF8";
  $user = "root";
  $pass = "";

  try {
    $dbh = new PDO($dsn,$user,$pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $dbh;
  } catch (PDOException $e) {
    $GLOBALS["err_msg"] = $e->getMessage();
    die();
  }
}

function getErrMsg()
{
  return $GLOBALS["err_msg"];
}

function createSession($session_data = array())
{
  foreach ($session_data as $key => $value) {
    $_SESSION[$key] = $value;
  }
}

function session($session_key)
{
  if (array_key_exists($session_key, $_SESSION)) {
    return $_SESSION[$session_key];
  }else {
    return false;
  }
}

function secure($data)
{
  $d = htmlentities($data, ENT_QUOTES);
  return $d;
}

function slug($slug_text)
{
  $search = array("é","è","ê","ô","î","ï","à","â","ç","ù","'"," ",",",";");
  $replace = array("e","e","e","o","i","i","a","a","c","u","-","-","-","-");
  $transform = str_replace($search, $replace, $slug_text);
  $slug_array = explode(" ", trim($transform));
  $slug = strtolower(implode("-",$slug_array));
  return $slug;
}
