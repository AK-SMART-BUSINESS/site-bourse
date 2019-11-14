<?php

namespace Libs\panel;


use App\Session;
use Libs\Common;
use Libs\I\panel\PanelUsrInt;

class MngUsers extends Common implements PanelUsrInt
{
    public function addUser(User $user)
    {
        // TODO: Implement addUser() method.
    }

    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    public function getUser($id)
    {
        // TODO: Implement getUser() method.
    }

    public function updateUser(User $user, $id)
    {
        // TODO: Implement updateUser() method.
    }

    /**
     * Recupération d'un utilisateur par mail
     * @param $email
     * @return bool
     */
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM panel_users WHERE email=?";
        try{
            if ($email != ""){
                $req = $this->db->prepare($sql);
                $req->execute(array($email));
                $res = $req->fetch();
                $req->closeCursor();
                return $res;
            }else{
                throw new \Exception("Error ! Invalide parameter <email>.");
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }

    public function connectUser($user_email, $user_pass)
    {
        $user = $this->getUserByEmail($user_email);
        if ($user){
            if ($user->etat == 'on'){
                if ($user->pwd == $user_pass){
                    $session_params = array("uid"=>$user->id,
                                            "ugroupe" => $user->groupe);
                    Session::createSession($session_params);
                    if (Session::sessionExist())
                        return true;
                    else
                        return false;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function isUserConnected()
    {
        if (isset($_SESSION['uid']) && !empty($_SESSION["uid"])){
            return true;
        }else{
            return false;
        }
    }


    public function test()
    {
        return $this->db;
    }
}