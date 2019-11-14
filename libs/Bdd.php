<?php
namespace Libs;

/**
 * Connexion à la base de données
 * Class Bdd
 * @package Libs
 */
class Bdd
{
    private static $db;

    /////////////////////////////////////////////////////
    ///             Database parameters               ///
    /// --------------------------------------------- ///

    private static $host = 'localhost';
    private static $dbname = 'bourse';
    private static $dbuser = 'root';
    private static $dbpass = '';
    /// -------------------------------------------- ///
    ////////////////////////////////////////////////////
    /**
     * Initialise la base de donées
     * @return void
     */
    private static function initDb()
    {
        try{
            self::$db = new \PDO(self::dsn(), self::getDbuser(), self::getDbpass());
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            echo 'Erreur de connexion à la bdd ! \n'.$e->getMessage();
            exit();
        }
    }

    private static function dsn()
    {
        $dsn = 'mysql:host='.self::$host.';dbname='.self::$dbname.';charset=utf8';
        return $dsn;
    }

    public static function getDb()
    {
        if (self::$db == null){
            self::initDb();
        }
        return self::$db;
    }

    /**
     * @return mixed
     */
    private static function getHost()
    {
        return self::$host;
    }

    /**
     * @return mixed
     */
    private static function getDbname()
    {
        return self::$dbname;
    }

    /**
     * @return string
     */
    private static function getDbuser()
    {
        return self::$dbuser;
    }

    /**
     * @return mixed
     */
    private static function getDbpass()
    {
        return self::$dbpass;
    }
}