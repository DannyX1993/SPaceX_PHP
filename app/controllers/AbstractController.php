<?php
namespace controllers;

abstract class AbstractController
{

    protected $_repository;

    public function __construct(\models\repositories\AbstractRepository $r)
    {
        $this->_repository = $r;
    }

}
