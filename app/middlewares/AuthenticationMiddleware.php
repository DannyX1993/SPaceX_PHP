<?php

namespace middlewares;

abstract class AuthenticationMiddleware
{

    protected $_request;
    protected $_response;

    public function __invoke(&$request, &$response, $next)
    {
        $this->_request = $request;
        $this->_response = $response;

        $auth = $this->authentication();

        if ($auth) {
            $this->_response = $next($this->_request, $this->_response);
            return $this->_response;
        } else return $this->_response;
    }

    public abstract function authentication();
}

?>
