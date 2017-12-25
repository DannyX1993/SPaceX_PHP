<?php

namespace models\entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 **/
class UserEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     **/
    protected $created;

    /**
     * @ORM\Column(type="integer", nullable=false)
     **/
    protected $lastAccess;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     **/
    protected $nickname;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     **/
    protected $email;

    /**
     * @ORM\Column(type="string", nullable=false)
     **/
    protected $password;

    /**
     * @ORM\OneToMany(targetEntity="PlanetEntity", mappedBy="user")
     */
    protected $planets;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     **/
    protected $holidaysMode;

    public function __construct()
    {
        $this->planets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLastAccess()
    {
        return $this->lastAccess;
    }

    public function setCreated(int $time)
    {
        $this->created = $time;
    }

    public function setNickname(string $nick)
    {
        $this->nickname = $nick;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $pass)
    {
        $this->password = $pass;
    }

    public function setLastAccess(int $time)
    {
        $this->lastAccess = $time;
    }

    public function setHolidaysMode($bool)
    {
        $this->holidaysMode = $bool;
    }

    public function addPlanet(PlanetEntity $planetEntity)
    {
        $this->planets->add($planetEntity);
    }

    public function getPlanets()
    {
        return $this->planets;
    }

    public function getPlanet($id)
    {
        if (count($this->planets)) {
            foreach ($this->planets as $planet) {
                if ($planet->getId() == $id) return $planet;
            }
        }
    }

}

?>
