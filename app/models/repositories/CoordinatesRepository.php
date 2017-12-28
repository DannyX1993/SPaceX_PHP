<?php

namespace models\repositories;

use config\Config;
use \Doctrine\ORM\EntityManager as EntityManager;
use models\entities\CoordinatesEntity;

class CoordinatesRepository extends AbstractRepository
{

    protected $_settingsRepository;

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\CoordinatesEntity');
        $this->_settingsRepository = new SettingsRepository($this->_em);
    }

    public function generateCoordinates()
    {
        $lastGalaxy = $this->_settingsRepository->findByName('last_galaxy');
        $lastSystem = $this->_settingsRepository->findByName('last_system');
        $lastPosition = $this->_settingsRepository->findByName('last_position');

        $Coordinates = new CoordinatesEntity();
        if (!strlen($lastGalaxy) && !strlen($lastSystem) && !strlen($lastPosition)) {
            $Coordinates->setGalaxy(1);
            $Coordinates->setSystem(1);
            $Coordinates->setPosition(1);
        } else {
            // FIXME -> REVISAR ESTE PROCESO
            for ($galaxy = $lastGalaxy; $galaxy <= Config::WORLD_MAX_GALAXIES; $galaxy++) {
                for ($system = $lastSystem; $system <= Config::GALAXY_MAX_SYSTEMS; $system++) {
                    for ($position = $lastPosition; $position <= 4; $position++) {
                        $planet = round(mt_rand(4, 12));
                        switch ($lastPosition) {
                            case 1:
                            case 2:
                                $lastPosition += 1;
                                break;
                            case 3:
                                if ($lastSystem == Config::GALAXY_MAX_SYSTEMS) {
                                    $lastGalaxy += 1;
                                    $lastSystem = 1;
                                    $lastPosition = 1;
                                    break;
                                } else {
                                    $lastPosition = 1;
                                }
                                $lastSystem += 1;
                                break;
                        }
                        break;
                    }
                    break;
                }
                break;
            }

            // TODO -> COMPROBAR SI EXISTE UN PLANETA EN ESAS COORDENADAS SI NO EXISTE SE CREA, SI EXISTE SE REPITE PROCESO

            $Coordinates->setGalaxy($galaxy);
            $Coordinates->setSystem($system);
            $Coordinates->setPosition($position);

        }

        $this->_em->persist($Coordinates);

        $this->_settingsRepository->write('last_galaxy', $Coordinates->getGalaxy());
        $this->_settingsRepository->write('last_system', $Coordinates->getSystem());
        $this->_settingsRepository->write('last_position', $Coordinates->getPosition());

        return $Coordinates;
    }

}