<?php

namespace controllers;


class PlanetsController extends AbstractController
{

    public function getAllUserPlanets($userId)
    {
        $planets = $this->_repository->findByUser($userId);
        return $planets;
    }

    public function getUserPlanet($userId, $planetId)
    {
        $planet = $this->_repository->findByUserAndId($userId, $planetId);
        return $planet;
    }

}