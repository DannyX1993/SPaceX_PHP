<?php

namespace controllers;
use \Firebase\JWT\JWT as JWT;

class UsersPublicController extends AbstractController
{

    public function login(string $name, string $password)
    {
        $user = $this->_repository->findByNicknameAndPassword($name, $password);
        if ($user !== null) {
            $currTime = time();
            $token = array(
                'iat' => $currTime,
                'exp' => $currTime + (60 * 60 * \config\Config::EXP_HOURS),
                'userId' => $user->getId()
            );

            $jwt = JWT::encode($token, \config\Config::JWT_PASSWORD, \config\EncryptionAlgorithm::HS256);
            return $jwt;
        } else return null;
    }

    public function register(string $nick, string $email, string $password)
    {
        return $this->_repository->insert($nick, $email, $password);
    }

}

?>
