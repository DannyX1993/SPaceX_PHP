<?php

require __DIR__ . '/Autoloader.php';

$container = $app->getContainer();

/*$container['settings'] = function($c) {
    $settings = [
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'app/models/entities'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'dbname'   => 'spacex',
                'user'     => 'root',
                'password' => 'root'
            ]
        ]
    ];
    return $settings;
};*/

// Doctrine
$container['em'] = function (\Interop\Container\ContainerInterface $c) {
    // TODO -> INTENTAR JUNTA SETTINGS CON cli-config.php PARA QUE SOLO ESTÉ EN UN LADO
    //$settings = $c->get('settings');
    $settings = [
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'models/entities'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' => __DIR__ . '/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => '127.0.0.1',
                'dbname' => 'spacex',
                'user' => 'root',
                'password' => 'root'
            ]
        ]
    ];

    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// Controladores
$container['\controllers\UsersPublicController'] = function (\Interop\Container\ContainerInterface $c) {
    $repository = new \models\repositories\UsersRepository($c->get('em'));
    return new \controllers\UsersPublicController($repository);
};
$container['\controllers\UsersController'] = function (\Interop\Container\ContainerInterface $c) {
    $repository = new \models\repositories\UsersRepository($c->get('em'));
    return new \controllers\UsersController($repository);
};

?>
