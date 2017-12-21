<?php

namespace middlewares;
use \Firebase\JWT\JWT as JWT;
use \Firebase\JWT\SignatureInvalidException as SignatureInvalidException;
use \Firebase\JWT\ExpiredException as ExpiredException;
use \middlewares\exceptions\TokenSignatureInvalidException as TokenSignatureInvalidException;
use \middlewares\exceptions\TokenExpiredException as TokenExpiredException;
use \middlewares\exceptions\AuthorizationRequiredException as AuthorizationRequiredException;

class JWTAuthenticationMiddleware extends AuthenticationMiddleware
{

    public function authentication()
    {
        $authorization = explode(' ', $this->_request->getHeader('Authorization')[0])[1];
        if ($authorization !== null) {
            try {
                $decoded = JWT::decode($authorization, \config\Config::JWT_PASSWORD, array(\config\EncryptionAlgorithm::HS256));
                $this->_request = $this->_request->withAttribute('userId', $decoded->userId);
                return true;
            } catch (SignatureInvalidException $e) {
                throw new TokenSignatureInvalidException();
            } catch (ExpiredException $e) {
                throw new TokenExpiredException();
            }
        } else {
            throw new AuthorizationRequiredException();
        }
    }

}

?>
