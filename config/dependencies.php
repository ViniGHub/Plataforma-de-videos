<?php
use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function ():  PDO {
        $dbPath = "../banco.sqlite";
        return new PDO("sqlite:$dbPath");
    }
]);

/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;