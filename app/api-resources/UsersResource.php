<?php

namespace api;

use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;
use \api\exceptions\InvalidInfoAccessException as InvalidInfoAccessException;
use \wrappers\UserWrapper as UserWrapper;

class UsersResource extends AbstractResource
{

    public function __construct($c)
    {
        parent::__construct($c);
        $this->_controller = $c->get('\controllers\UsersController');
    }

    public function data(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $tokenUserId = $request->getAttribute('userId');
        if (intval($args['id']) === $tokenUserId) { // Obtiene info de él mismo
            $User = $this->_controller->getUserData($args['id']);
            $args = array(
                'id' => $User->getId(),
                'lastAccess' => $User->getLastAccess(),
                'nickname' => $User->getNickname(),
                'email' => $User->getEmail(),
            );
            return $this->_getWrapper($response, 'UserWrapper', $args, ($body['format']) ? $body['format'] : \config\Config::DEFAULT_FORMAT);
        } else {
            throw new InvalidInfoAccessException();
        }
    }

}
