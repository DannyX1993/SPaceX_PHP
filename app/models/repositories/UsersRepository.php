<?php

namespace models\repositories;

use \models\entities\UserEntity as UserEntity;

class UsersRepository extends AbstractRepository
{

    protected $_entity;

    public function __construct(\Doctrine\ORM\EntityManager &$em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\UserEntity');
    }

    public function insert(string $nick, string $email, string $password)
    {
        $User = $this->_findOneBy(array('nickname' => $nick));

        if ($User === null) {
            $User = $this->_findOneBy(array('email' => $email));

            if ($User === null) {
                $time = time();
                $User = new UserEntity();
                $User->setCreated($time);
                $User->setEmail($email);
                $User->setNickname($nick);
                $User->setPassword(hash("sha256", $password));
                $User->setHolidaysMode(false);
                $User->setLastAccess($time);

                // TODO -> DAR DE ALTA PLANETA PRINCIPAL

                $this->_em->persist($User);
                $this->_em->flush();
                return $User;
            }
        }
        return null;
    }

    public function findByNicknameAndPassword(string $nick, string $pass)
    {
        $User = $this->_findOneBy(array('nickname' => $nick, 'password' => hash("sha256", $pass)));
        if ($User !== null) {
            $User->setLastAccess(time());
            $this->_em->persist($User);
            $this->_em->flush();
        }
        return $User;
    }

    public function findByNicknameOrEmail(string $nick, string $email)
    {

    }

    public function findById(string $id)
    {
        return $this->_findOneBy(array('id' => $id));
    }

    private function _findOneBy(array $array)
    {
        $User = $this->_entity->findOneBy($array);
        return $User;
    }

}
