<?php

namespace api;

use Psr\Http\Message\ServerRequestInterface as ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as ResponseInterface;
use \api\exceptions\UserExistException as UserExistException;
use \api\exceptions\AuthorizationFailedException as AuthorizationFailedException;

class UsersPublicResource extends AbstractResource
{

    public function __construct($c)
    {
        parent::__construct($c);
        $this->_controller = $c->get('\controllers\UsersPublicController');
    }

    public function authentication(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $body = $request->getParsedBody();
        $token = $this->_controller->login($body['user'], $body['pass']);
        if ($token !== null) {
            $args = array('token' => $token);
            return $this->_wrapperResponse($response, 'TokenWrapper', $args, ($body['format']) ? $body['format'] : \config\Config::DEFAULT_FORMAT);
        } else throw new AuthorizationFailedException();
    }

    public function register(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $body = $request->getParsedBody();
        $User = $this->_controller->register($body['nickname'], $body['email'], $body['password']);
        if ($User === null) throw new UserExistException();
        else {
            $args = array(
                'id' => $User->getId(),
                'created' => $User->getCreated(),
                'nickname' => $User->getNickname()
            );
            return $this->_wrapperResponse($response, 'UserWrapper', $args, ($body['format']) ? $body['format'] : \config\Config::DEFAULT_FORMAT);
        }
    }

}
