<?php

namespace models\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="planets")
 **/
class PlanetEntity
{

    // TODO -> CAMPOS OCUPADOS Y CAMPOS MÁXIMOS

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserEntity", inversedBy="planets")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="string", nullable=false, length=50, options={"default":"Planeta principal"})
     **/
    protected $name;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":true})
     **/
    protected $main;

    /**
     * @ORM\Column(type="float", nullable=false, options={"default":0.00})
     **/
    protected $metal;

    /**
     * @ORM\Column(type="float", nullable=false, options={"default":0.00})
     **/
    protected $crystal;

    /**
     * @ORM\Column(type="float", nullable=false, options={"default":0.00})
     **/
    protected $deuterium;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $currEnergy;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $maxEnergy;


    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getName()
    {
        return $this->name;
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

    public function isMain()
    {
        return $this->main;
    }

    public function setId(integer $id)
    {
        $this->id = $id;
    }

    public function setUser(UserEntity $user)
    {
        $this->user = $user;
    }

    public function setName(string $name)
    {
        $this->name = $name;
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

    public function setCurrEnergy(float $energy)
    {
        $this->currEnergy = $energy;
    }

    public function setMaxEnergy(float $energy)
    {
        $this->maxEnergy = $energy;
    }

    public function setMain($bool)
    {
        $this->main = $bool;
    }

}
