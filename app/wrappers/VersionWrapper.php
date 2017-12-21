<?php
namespace wrappers;

class VersionWrapper extends JSONWrapper
{

    public $version;

    public function __construct(string $version)
    {
        $this->version = $version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

}

?>
