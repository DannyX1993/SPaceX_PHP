<?php
/**
 * Created by PhpStorm.
 * User: danielgonzalez
 * Date: 25/12/17
 * Time: 22:17
 */

namespace models\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="settings")
 **/
class SettingEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     **/
    protected $value;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }


}