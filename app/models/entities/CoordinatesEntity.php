<?php

namespace models\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="coordinates")
 **/
class CoordinatesEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $galaxy;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $system;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $position;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default":0.00})
     **/
    protected $debrisMetal;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default":0.00})
     **/
    protected $debrisCrystal;


    public function getId()
    {
        return $this->id;
    }


    public function getGalaxy()
    {
        return $this->galaxy;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getDebrisMetal()
    {
        return $this->debrisMetal;
    }

    public function getDebrisCrystal()
    {
        return $this->debrisCrystal;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setGalaxy($galaxy)
    {
        $this->galaxy = $galaxy;
    }

    public function setSystem($system)
    {
        $this->system = $system;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function setDebrisMetal($debrisMetal)
    {
        $this->debrisMetal = $debrisMetal;
    }

    public function setDebrisCrystal($debrisCrystal)
    {
        $this->debrisCrystal = $debrisCrystal;
    }

}