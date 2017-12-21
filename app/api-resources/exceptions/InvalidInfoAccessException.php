<?php

namespace api\exceptions;

class InvalidInfoAccessException extends \Exception
{

    const HTTP_RESPONSE_CODE = 404;
    const MSG = 'No puedes acceder a esa información';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
