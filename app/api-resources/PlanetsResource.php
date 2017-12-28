<?php

namespace api;

use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;
use \config\Config as Config;

class PlanetsResource extends AbstractResource
{

    public function __construct($c)
    {
        parent::__construct($c);
        $this->_controller = $c->get('\controllers\PlanetsController');
    }

    public function userPlanets(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $body = $request->getParsedBody();
        $userId = $args['id'];
        $tokenUserId = $request->getAttribute('userId');

        if ($userId == $tokenUserId) {
            $planets = $this->_controller->getAllUserPlanets($userId);

            $PlanetsWrapperArgs = [];
            if (count($planets)) {
                foreach ($planets as $planet) {
                    // TODO -> MEJORA: WRAPPER COORDENADAS
                    $Coordinates = $planet->getCoordinates();
                    $coords = $Coordinates->getGalaxy() . ':' .
                        $Coordinates->getSystem() . ':' .
                        $Coordinates->getCoordinates()->getPosition();

                    $args = array(
                        'id' => $planet->getId(),
                        'main' => $planet->isMain(),
                        'name' => $planet->getName(),
                        'metal' => $planet->getMetal(),
                        'crystal' => $planet->getCrystal(),
                        'deuterium' => $planet->getDeuterium(),
                        'currEnergy' => $planet->getCurrEnergy(),
                        'maxEnergy' => $planet->getMaxEnergy(),
                        'diameter' => $planet->getDiameter(),
                        'minTemp' => $planet->getMinTemp(),
                        'maxTemp' => $planet->getMaxTemp(),
                        'currFields' => $planet->getCurrFields(),
                        'maxFields' => $planet->getMaxFields(),
                        'coordinates' => $coords,
                    );
                    // TODO -> MEJORA: ¿QUE EN ESTE WRAPPER AL HACER SETCOORDS QUE CREE EL WRAPPER COORDS?
                    $PlanetWrapper = $this->_getWrapper('PlanetWrapper', $args, ($body['format']) ? $body['format'] : Config::DEFAULT_FORMAT);
                    array_push($PlanetsWrapperArgs, $PlanetWrapper);
                }
            }
            return $this->_wrapperResponse($response, 'UserPlanetsWrapper', array('planets' => $PlanetsWrapperArgs));
        } else throw new InvalidInfoAccessException();
    }

}