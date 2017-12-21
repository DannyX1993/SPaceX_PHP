<?php

namespace middlewares\exceptions;

class TokenExpiredException extends \Exception
{

    const HTTP_RESPONSE_CODE = 404;
    const MSG = 'El token ha expirado';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
