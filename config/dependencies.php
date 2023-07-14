<?php
use DI\ContainerBuilder;
use League\Plates\Engine;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function ():  PDO {
        $dbPath = "../banco.sqlite";
        return new PDO("sqlite:$dbPath");
    },
    Engine::class => function(): Engine {
        return new Engine('../views');
    }
]);

/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;