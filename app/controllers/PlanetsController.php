<?php

namespace controllers;


class PlanetsController extends AbstractController
{

    public function getAllUserPlanets($userId)
    {
        $planets = $this->_repository->findByUser($userId);
        return $planets;
    }

}