<?php

namespace api\exceptions;

class InvalidWrapperFormatException extends \Exception
{

    const HTTP_RESPONSE_CODE = 404;
    const MSG = 'No existe ese formato de salida para el wrapper';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
