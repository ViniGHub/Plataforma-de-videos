<?php

declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repo\VideoRepository;
use Alura\Mvc\Controller\Error404Controller;
use Alura\Mvc\Repo\UserRepository;


require_once __DIR__ . '/../vendor/autoload.php';

/** @var Controller $controller */

// var_dump($_SERVER);
// echo $_SESSION['logado'] . 'olha';
$dbPath = "../banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);
$userRepository = new UserRepository($pdo);

$routes = require_once '../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$loginRoute = '/log';

session_start();
session_regenerate_id();
if (!array_key_exists('logado', $_SESSION) && !($pathInfo === $loginRoute)) {
    $_SESSION['logado'] = false;
    $_SESSION['error_message'] = 'Você deve logar antes.';
    header('location: /log');
    return;
} elseif (!$_SESSION['logado'] && !($pathInfo === $loginRoute)) {
    $_SESSION['error_message'] = 'Você deve logar antes.';
    header('location: /log');
    return;
}

if (array_key_exists("$httpMethod|$pathInfo", $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    if ("$httpMethod|$pathInfo" === 'POST|/log') {
        $controller = new $controllerClass($userRepository);
    } else {
        $controller = new $controllerClass($videoRepository);
    }
} else {
    $controller = new Error404Controller($videoRepository);
}

$controller->processaRequisicao();
