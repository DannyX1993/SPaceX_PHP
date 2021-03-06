<?php
namespace middlewares;

class ThrowableMiddleware
{
    protected $_request;
    protected $_response;

    public function __invoke(&$request, &$response, $next)
    {
        $this->_request = $request;
        $this->_response = $response;

        try {
            $this->_response = $next($this->_request, $this->_response);
            return $this->_response;
        } catch (\Doctrine\DBAL\Exception\NotNullConstraintViolationException $e) {
            // TODO -> HACERLO MEDIANTE UN WRAPPER ASI PODEMOS HACERLO EN CUALQUIER FORMATO
            $error = array('code' => $e->getCode(), 'error' => $e->getMessage());
            $this->_response = $this->_response->withJSON($error)->withStatus(500);
            return $this->_response;
        } catch (\Exception $e) {
            // TODO -> HACERLO MEDIANTE UN WRAPPER ASI PODEMOS HACERLO EN CUALQUIER FORMATO
            $error = array('code' => $e->getCode(), 'error' => $e->getMessage());
            $this->_response = $this->_response->withJSON($error)->withStatus($e->getCode());
            return $this->_response;
        }
    }
}
