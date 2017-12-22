<?php
/**
 * Created by PhpStorm.
 * User: danielgonzalez
 * Date: 21/12/17
 * Time: 23:50
 */

namespace models\repositories;

use \Doctrine\ORM\EntityManager as EntityManager;
use models\entities\UserEntity;
use models\entities\PlanetEntity;


class PlanetsRepository extends AbstractRepository
{

    protected $_entity;

    public function __construct(EntityManager &$em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\PlanetEntity');
    }

    protected function _generatePlanet(array $params)
    {
        $Planet = new PlanetEntity();
        $Planet->setUser($params['User']);
        $Planet->setName('Planet Principal');
        $Planet->setMain($params['main']);
        $Planet->setMetal(500);
        $Planet->setCrystal(500);
        $Planet->setDeuterium(0);
        $Planet->setCurrEnergy(0);
        $Planet->setMaxEnergy(0);

        // TODO -> CAMPOS OCUPADOS Y CAMPOS MÁXIMOS
        // TODO -> LUGAR DEL PLANETA POR DEFECTO

        $this->_em->persist($Planet);
    }

    public function generateFirstPlanet(UserEntity $User)
    {
        $params = array('User' => $User, 'main' => true);
        $this->_generatePlanet($params);
    }

    public function findByUser($userId)
    {
        $planets = $this->_entity->findBy(array('user' => $userId));
        return $planets;
    }
}