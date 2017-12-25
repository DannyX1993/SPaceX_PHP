<?php

namespace api;

use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;
use wrappers\JSONPlanetWrapper;

class PlanetsResource extends AbstractResource
{

    public function __construct($c)
    {
        parent::__construct($c);
        $this->_controller = $c->get('\controllers\PlanetsController');
    }

    public function userPlanets(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $userId = $args['id'];
        $tokenUserId = $request->getAttribute('userId');


        if ($userId == $tokenUserId) {
            $planets = $this->_controller->getAllUserPlanets($userId);

            $PlanetsWrapperArgs = [];
            if (count($planets)) {
                foreach ($planets as $planet) {
                    $PlanetWrapper = new JSONPlanetWrapper();
                    $PlanetWrapper->setId($planet->getId());
                    $PlanetWrapper->setMain($planet->isMain());
                    $PlanetWrapper->setName($planet->getName());
                    $PlanetWrapper->setMetal($planet->getMetal());
                    $PlanetWrapper->setCrystal($planet->getCrystal());
                    $PlanetWrapper->setDeuterium($planet->getDeuterium());
                    $PlanetWrapper->setCurrEnergy($planet->getCurrEnergy());
                    $PlanetWrapper->setMaxEnergy($planet->getMaxEnergy());
                    array_push($PlanetsWrapperArgs, $PlanetWrapper);
                }
            }
            return $this->_getWrapper($response, 'UserPlanetsWrapper', array('planets' => $PlanetsWrapperArgs));
        } else throw new InvalidInfoAccessException();
    }

}