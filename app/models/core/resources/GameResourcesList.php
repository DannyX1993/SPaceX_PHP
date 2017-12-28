<?php

namespace models\core\resources;


use models\core\resources\buildings\MetalMine;

class GameResourcesList
{

    protected static $instance;

    protected $resources;

    protected function __construct()
    {
        $this->resources = [];
        $this->init();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $Class = __CLASS__;
            self::$instance = new $Class;
        }
        return self::$instance;
    }

    protected function init()
    {
        $this->addResource(1, MetalMine::getInstance());
    }

    protected function addResource(int $id, GameResource $resource)
    {
        $this->resources[$id] = $resource;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function findById(int $id)
    {
        if (!isset($this->resources[$id])) {
            // TODO -> EXCEPTION
            return null;
        }
        return $this->resources[$id];
    }

}