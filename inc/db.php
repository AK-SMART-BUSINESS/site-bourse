<?php
$dsn = "mysql:host=localhost;dbname=git_suivi;charset=UTF8";
//$user = "gitcicom_svusr";
$user = "root";
//$pass = "cGyS.~JDSf&A";
$pass = "";
$db = "";

$err = "";

function db()
{
  try {
    $db = new PDO($dsn,$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    if ($db) {
      return $db;
    }
  } catch (\PDOException $e) {
    die($e->getMessage());
  }
}

function errMsg()
{
  return $err;
}

createSession($session_data = array())
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
