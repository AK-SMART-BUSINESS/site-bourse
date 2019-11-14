<?php

namespace Libs;

class Common
{
    protected $db = null;
    protected $msgErr = "";

    /**
     * Common constructor.
     * @param $db
     */
    public function __construct()
    {
        try{
            if ($this->db == null){
                $this->db = Bdd::getDb();
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            exit();
        }

    }

    /**
     * @return string
     */
    public function getMsgErr()
    {
        return $this->msgErr;
    }

    /**
     * @param string $msgErr
     */
    protected function setMsgErr($msgErr)
    {
        $this->msgErr = $msgErr;
    }

}