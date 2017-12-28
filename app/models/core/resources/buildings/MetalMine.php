<?php

namespace models\core\resources\buildings;

use models\core\resources\GameResource;
use models\core\resources\GameResourceSections;
use models\core\resources\Requirement;

class MetalMine extends GameResource
{

    protected function __construct()
    {
        parent::__construct();

        // Datos principales
        $this->setId(1);
        $this->setSection(GameResourceSections::BUILDINGS);
        $this->setName('Mina de metal');
        $this->setDescription('Las minas de metal proveen los recursos básicos de un imperio emergente, y permiten la construcción de edificios y naves.');

        // Requerimientos
        $this->addRequirement(new Requirement($this, 1));
    }

}