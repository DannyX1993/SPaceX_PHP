<?php

namespace middlewares\exceptions;

class TokenSignatureInvalidException extends \Exception
{

    const HTTP_RESPONSE_CODE = 500;
    const MSG = 'Firma del token inválida';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
