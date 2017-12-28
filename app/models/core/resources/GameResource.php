<?php

namespace models\core\resources;


abstract class GameResource
{

    protected static $instance;

    protected $id;

    protected $section;

    protected $name; // TODO -> INTEGRAR MULTIIDIOMA

    protected $description; // TODO -> INTEGRAR MULTIIDIOMA

    protected $requirements;

    protected $costs;

    protected function __construct()
    {
        $this->requirements = [];
        $this->costs = [];
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $Class = __CLASS__;
            self::$instancia = new $Class;
        }

        return self::$instance;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getSection()
    {
        return $this->section;
    }

    public function setSection(GameResourceSections $section)
    {
        $this->section = $section;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function addRequirement(Requirement $requirement)
    {
        array_push($this->requirements, $requirement);
    }

    public function getRequirements()
    {
        return $this->requirements;
    }
}