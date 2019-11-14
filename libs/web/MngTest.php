<?php

namespace Libs\web;


use Libs\Common;
use Libs\I\Web\TestInt;

class MngTest extends Common implements TestInt
{
    public function testeDb($request)
    {
        try{
            if ($request != ""){
                $req = $this->db->prepare($request);
                $req->execute();
                $res = $req->fetchAll();
                $req->closeCursor();
                return $res;
            }
            else{
                throw new \Exception("Error ! Invalid parameter [request]");
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }
    /*public function testeDb()
    {

        try{
            $req = $this->db->prepare("SELECT * FROM articles_test");
            $req->execute();
            $res = $req->fetchAll();
            $req->closeCursor();
            return $res;
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }*/

    public function test()
    {
        echo "Test Ok";
    }

}