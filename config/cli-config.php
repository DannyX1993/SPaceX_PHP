<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require 'vendor/autoload.php';

$settings = [
    'doctrine' => [
        'meta' => [
            'entity_path' => [
                'app/models/entities'
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
$settings = $settings['doctrine'];

$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

$em = \Doctrine\ORM\EntityManager::create($settings['connection'], $config);

return ConsoleRunner::createHelperSet($em);
?>
