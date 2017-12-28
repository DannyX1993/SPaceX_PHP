<?php

namespace models\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="resources")
 **/
class ResourceEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="PlanetEntity", inversedBy="resources")
     * @ORM\JoinColumn(name="planet_id", referencedColumnName="id")
     */
    protected $planet;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $resource_id;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     **/
    protected $level;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPlanet()
    {
        return $this->planet;
    }

    public function setPlanet($planet)
    {
        $this->planet = $planet;
    }

    public function getResourceId()
    {
        return $this->resource_id;
    }

    public function setResourceId($resource_id)
    {
        $this->resource_id = $resource_id;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

}