<?php

namespace models\repositories;

use \Doctrine\ORM\EntityManager as EntityManager;

use \models\repositories\PlanetsRepository as PlanetsRepository;

use models\entities\PlanetEntity;
use \models\entities\UserEntity as UserEntity;

class UsersRepository extends AbstractRepository
{

    protected $_entity;
    protected $_planetRepository;

    public function __construct(EntityManager &$em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\UserEntity');
        $this->_planetRepository = new PlanetsRepository($this->_em);
    }

    public function insert(string $nick, string $email, string $password)
    {
        $User = $this->_findOneBy(array('nickname' => $nick));

        if ($User === null) {
            $User = $this->_findOneBy(array('email' => $email));

            if ($User === null) {
                $this->_em->getConnection()->beginTransaction();

                try {
                    $time = time();
                    $User = new UserEntity();
                    $User->setCreated($time);
                    $User->setEmail($email);
                    $User->setNickname($nick);
                    $User->setPassword(hash("sha256", $password));
                    $User->setHolidaysMode(false);
                    $User->setLastAccess($time);
                    $this->_em->persist($User);

                    // Damos de alta el planeta principal
                    $this->_planetRepository->generateFirstPlanet($User);

                    $this->_em->flush();
                    $this->_em->getConnection()->commit();
                } catch (\Exception $e) {
                    $this->_em->getConnection()->rollBack();
                    throw $e;
                }

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
