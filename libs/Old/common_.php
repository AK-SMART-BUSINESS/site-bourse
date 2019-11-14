<?php
/**
 * Ajouter toutes les fonctions communes aux différents fichiers 
 * de l'application
 */
require_once 'basic.php';


function select($table)
{
  $sql = "SELECT * FROM $table";
  $req = db()->prepare($sql);
  $req->execute();
  return $req->fetchAll();
}

function all($table)
{
  $sql = "SELECT * FROM $table";
  $req = db()->prepare($sql);
  $req->execute();
  return $req->fetchAll();
}

function exec_request($sql, $params=[], $one=false)
{
  $req = null;
  try {
    $req = db()->prepare($sql);
    if (empty($params)) {
      $req->execute($params);
    }else {
      $req->execute();
    }
    if ($one) {
      return $req->fetch();
    } else {
      return $req->fetchAll();
    }
  } catch (PDOException $e) {
    $GLOBALS["err_msg"] = $e->getMessage();
  }
}