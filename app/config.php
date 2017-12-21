<?php

require_once __DIR__ . "/../vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ]
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

?>
