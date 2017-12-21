<?php

namespace api\exceptions;

class AuthorizationFailedException extends \Exception
{

    const HTTP_RESPONSE_CODE = 404;
    const MSG = 'No existe ningun usuario con esos datos';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
