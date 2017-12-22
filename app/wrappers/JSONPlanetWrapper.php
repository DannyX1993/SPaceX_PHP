<?php

namespace wrappers;


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
}