<?php

namespace api;

use Psr\Http\Message\ResponseInterface as ResponseInterface;
use \api\exceptions\InvalidWrapperFormatException as InvalidWrapperFormatException;
use \api\exceptions\InvalidMethodWrapperException as InvalidMethodWrapperException;

abstract class AbstractResource
{

    protected $_container;
    protected $_controller;

    public function __construct($c)
    {
        $this->_container = $c;
    }

    protected function _getWrapper(ResponseInterface $response, string $wrapper, array $args, $format = 'json')
    {
        $wrapperClass = '\\wrappers\\' . strtoupper($format) . $wrapper;
        if (\class_exists($wrapperClass)) {
            $Wrapper = new $wrapperClass();
            if (count($args)) {
                foreach ($args as $key => $val) {
                    $method = 'set' . ucfirst($key);
                    if (\method_exists($Wrapper, $method)) {
                        $Wrapper->$method($val);
                    } else throw new InvalidMethodWrapperException($key);
                }
            }
            $response->getBody()->write($Wrapper);
            return $response->withStatus(200);
        } else throw new InvalidWrapperFormatException();
    }

}
