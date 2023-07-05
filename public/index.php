<?php
declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repo\VideoRepository;
use Alura\Mvc\Controller\Error404Controller;


require_once __DIR__ . '/../vendor/autoload.php';

/** @var Controller $controller */

// var_dump($_SERVER);
$dbPath = "../banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once '../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

if (array_key_exists("$httpMethod|$pathInfo" ,$routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller($videoRepository);
}

$controller->processaRequisicao();