<?php

namespace models\core\resources;


class Requirement
{

    protected $resource;

    protected $level;

    public function __construct(GameResource $resource, int $level)
    {
        $this->resource = $resource;
        $this->level = $level;
    }

}