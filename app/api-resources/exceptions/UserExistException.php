<?php

namespace api\exceptions;

class UserExistException extends \Exception
{

    const HTTP_RESPONSE_CODE = 405;
    const MSG = 'Ya existe un usuario con ese nickname o ese email';

    public function __construct()
    {
        parent::__construct(self::MSG, self::HTTP_RESPONSE_CODE);
    }

}
