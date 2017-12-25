<?php

namespace models\repositories;

use \Doctrine\ORM\EntityManager as EntityManager;
use models\entities\SettingEntity;


class SettingsRepository extends AbstractRepository
{

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->_entity = $this->_em->getRepository('\models\entities\SettingEntity');
    }

    public function write($name, $value)
    {
        $Setting = $this->findByName($name);
        if ($Setting === null) {
            $Setting = new SettingEntity();
            $Setting->setName($name);
        }
        $Setting->setValue($value);
        $this->_em->persist($Setting);
    }

    public function findByName($name)
    {
        $Setting = $this->_entity->findOneBy(array('name' => $name));
        return $Setting;
    }

}