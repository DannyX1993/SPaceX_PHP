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

    protected function _wrapperResponse(ResponseInterface $response, string $wrapper, array $args, string $format = 'json')
    {
        $Wrapper = $this->_getWrapper($wrapper, $args, $format);
        $response->getBody()->write($Wrapper);
        return $response->withStatus(200);
    }

    protected function _getWrapper(string $wrapper, array $args, string $format)
    {
        $wrapperClass = '\\wrappers\\' . strtoupper($format) . '\\' . strtoupper($format) . $wrapper;
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
        } else throw new InvalidWrapperFormatException();
        return $Wrapper;
    }

}
