<?php

namespace api\exceptions;

class InvalidMethodWrapperException extends \Exception
{

    const HTTP_RESPONSE_CODE = 404;
    const MSG = 'No existe el método set para la propiedad ';

    public function __construct($property)
    {
        parent::__construct(self::MSG . $property, self::HTTP_RESPONSE_CODE);
    }

}
