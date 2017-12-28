<?php

namespace models\repositories;

use config\Config as Config;
use Doctrine\ORM\EntityManager as EntityManager;
use models\entities\PlanetEntity;
use models\entities\UserEntity;
use models\PlanetsMaker;

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
        $Planet->setName('Planet Principal'); // FIXME
        $Planet->setMain($params['main']);
        $Planet->setCoordinates($params['Coordinates']);

        $Planet->setMetal($params['metal']);
        $Planet->setCrystal($params['crystal']);
        $Planet->setDeuterium($params['deuterium']);
        $Planet->setCurrEnergy(0);
        $Planet->setMaxEnergy(0);

        $Planet->setDiameter(PlanetsMaker::calculateDiameter($params['Coordinates']->getPosition(), $params['main']));
        $Planet->setCurrFields(0);
        $Planet->setMaxFields(PlanetsMaker::calculateMaxFields($Planet->getDiameter()));

        $temp = PlanetsMaker::calculateTemp($params['Coordinates']->getPosition());
        $Planet->setMinTemp($temp['min']);
        $Planet->setMaxTemp($temp['max']);

        $this->_em->persist($Planet);
    }

    public function generateFirstPlanet(UserEntity $User)
    {
        $Coordinates = $this->_coordinatesRepository->generateCoordinates();

        $params = array(
            'User' => $User,
            'main' => true,
            'Coordinates' => $Coordinates,
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

    public function findByUserAndId($userId, $planetId)
    {
        $planet = $this->_entity->findOneBy(array('user' => $userId, 'id' => $planetId));

        // TODO -> INSTANCIAR GameResourcesList y obtener los niveles por sección

        return $planet;
    }
}