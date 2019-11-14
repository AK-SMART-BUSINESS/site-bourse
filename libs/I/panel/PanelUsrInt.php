<?php

namespace Libs\I\panel;


use Libs\panel\User;

interface PanelUsrInt
{
    public function addUser(User $user);

    public function getUsers();

    public function getUser($id);

    public function updateUser(User $user, $id);

}