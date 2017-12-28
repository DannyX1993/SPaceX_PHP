<?php

namespace wrappers\JSON;


class JSONPlanetWrapper extends JSONWrapper
{

    protected $id;

    protected $name;

    protected $main;

    protected $metal;

    protected $crystal;

    protected $deuterium;

    protected $currEnergy;

    protected $maxEnergy;

    protected $diameter;

    protected $minTemp;

    protected $maxTemp;

    protected $currFields;

    protected $maxFields;

    protected $coordinates;

    protected $resources;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isMain()
    {
        return $this->main;
    }

    public function getMetal()
    {
        return $this->metal;
    }

    public function getCrystal()
    {
        return $this->crystal;
    }

    public function getDeuterium()
    {
        return $this->deuterium;
    }

    public function getCurrEnergy()
    {
        return $this->currEnergy;
    }

    public function getMaxEnergy()
    {
        return $this->maxEnergy;
    }

    public function getDiameter()
    {
        return $this->diameter;
    }

    public function getMinTemp()
    {
        return $this->minTemp;
    }

    public function getMaxTemp()
    {
        return $this->maxTemp;
    }

    public function getCurrFields()
    {
        return $this->currFields;
    }

    public function getMaxFields()
    {
        return $this->maxFields;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setMain($bool)
    {
        $this->bool = $bool;
    }

    public function setMetal(float $metal)
    {
        $this->metal = $metal;
    }

    public function setCrystal(float $crystal)
    {
        $this->crystal = $crystal;
    }

    public function setDeuterium(float $deuterium)
    {
        $this->deuterium = $deuterium;
    }

    public function setCurrEnergy(int $energy)
    {
        $this->currEnergy = $energy;
    }

    public function setMaxEnergy(int $energy)
    {
        $this->maxEnergy = $energy;
    }

    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;
    }

    public function setMinTemp($minTemp)
    {
        $this->minTemp = $minTemp;
    }

    public function setMaxTemp($maxTemp)
    {
        $this->maxTemp = $maxTemp;
    }

    public function setCurrFields($currFields)
    {
        $this->currFields = $currFields;
    }

    public function setMaxFields($maxFields)
    {
        $this->maxFields = $maxFields;
    }

    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;
    }

}