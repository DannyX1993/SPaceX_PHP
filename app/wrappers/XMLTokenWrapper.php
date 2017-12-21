<?php

namespace wrappers;

class XMLTokenWrapper extends XMLWrapper
{

    protected $token;

    public function __construct()
    {

    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

}
