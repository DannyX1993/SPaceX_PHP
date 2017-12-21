<?php
namespace models\repositories;

abstract class AbstractRepository
{

    protected $_em;

    public function __construct(\Doctrine\ORM\EntityManager &$em)
    {
        $this->_em = $em;
    }

}
