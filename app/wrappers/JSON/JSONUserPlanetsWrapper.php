<?php

namespace wrappers\JSON;


class JSONUserPlanetsWrapper extends JSONWrapper
{

    protected $planets;

    public function __construct()
    {
        $this->planets = [];
    }

    public function setPlanets(array $planets)
    {
        $this->planets = $planets;
    }

}