<?php
/**
 * Created by PhpStorm.
 * User: danielgonzalez
 * Date: 21/12/17
 * Time: 23:50
 */

namespace models\repositories;

use \Doctrine\ORM\EntityManager as EntityManager;
use \models\entities\PlanetEntity;
use \models\entities\UserEntity;

use \config\Config as Config;

class PlanetsRepository extends AbstractRepository
{

    protected $_entity;
    protected $_coordinatesRepository;

    public function __construct(EntityManager &$em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\PlanetEntity');
        $this->_coordinatesRepository = new CoordinatesRepository($this->_em);
    }

    protected function _generatePlanet(array $params)
    {
        $Planet = new PlanetEntity();
        $Planet->setUser($params['User']);
        $Planet->setName('Planet Principal');
        $Planet->setMain($params['main']);
        $Planet->setMetal($params['metal']);
        $Planet->setCrystal($params['crystal']);
        $Planet->setDeuterium($params['deuterium']);
        $Planet->setCurrEnergy(0);
        $Planet->setMaxEnergy(0);
        $Planet->setDiameter($params['diameter']);
        $Planet->setCurrFields(0);
        $Planet->setMaxFields(0); // FIXME -> 163 DE INICIO
        $Planet->setMinTemp(0); // FIXME
        $Planet->setMaxTemp(0); // FIXME
        $Planet->setCoordinates($params['Coordinates']);

        $this->_em->persist($Planet);
    }

    public function generateFirstPlanet(UserEntity $User)
    {
        $Coordinates = $this->_coordinatesRepository->generateCoordinates();

        $params = array(
            'User' => $User,
            'main' => true,
            'Coordinates' => $Coordinates,
            'diameter' => Config::INITIAL_DIAMETER,
            'metal' => Config::INITIAL_METAL,
            'crystal' => Config::INITIAL_CRYSTAL,
            'deuterium' => Config::INITIAL_DEUTERIUM
        );
        $this->_generatePlanet($params);
    }

    public function findByUser($userId)
    {
        $planets = $this->_entity->findBy(array('user' => $userId));
        return $planets;
    }
}