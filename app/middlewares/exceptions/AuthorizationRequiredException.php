<?php

namespace middlewares\exceptions;

class AuthorizationRequiredException extends \Exception
{

    const HTTP_RESPONSE_CODE = 403;
    const MSG = 'Autorización requerida';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
