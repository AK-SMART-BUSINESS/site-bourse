<?php

namespace Libs\I\Web;


Interface TestInt
{
    /**
     * Execute une simple requête de récupération dans la base de données
     * @param $request
     * @return mixed
     */
    public function testeDb($request);
    //public function testeDb();

    /**
     * Teste de fonctionnement
     * @return mixed
     */
    public function test();

}