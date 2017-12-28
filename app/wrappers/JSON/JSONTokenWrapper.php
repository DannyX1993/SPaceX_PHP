<?php

namespace wrappers\JSON;

class JSONTokenWrapper extends JSONWrapper
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
