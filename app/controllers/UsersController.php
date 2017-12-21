<?php

namespace controllers;

class UsersController extends AbstractController
{

    public function getUserData(string $id)
    {
        $user = $this->_repository->findById($id);
        return $user;
    }

    public function setUserData(string $nick, string $email, string $password)
    {
        $user = $this->_repository->insert($nick, $email, $password);
    }

}
