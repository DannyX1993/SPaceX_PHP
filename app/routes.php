<?php

$app->group('/api', function () use ($app) {

    /*
     * [ Recursos API publicos ]
     */
    $app->group('/public', function () use ($app) {
        $app->group('/users', function () use ($app) {
            $app->post('/login', \api\UsersPublicResource::class . ':authentication');
            $app->post('/register', \api\UsersPublicResource::class . ':register');
        });
    });

    /*
     * [ Recursos API privados ]
     */

    // Usuarios
    $app->group('/users', function () use ($app) {
        $app->get('/{id}', \api\UsersResource::class . ':data');
        $app->get('/{id}/planets', \api\PlanetsResource::class . ':userPlanets');
    })->add(new \middlewares\JWTAuthenticationMiddleware());

    // Planetas
    $app->group('/planets', function () use ($app) {
        // TODO -> PETICIONES PLANETAS
    })->add(new \middlewares\JWTAuthenticationMiddleware());

})->add(new \middlewares\ThrowableMiddleware());

?>
