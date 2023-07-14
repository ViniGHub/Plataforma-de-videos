<?php

declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repo\VideoRepository;
use Alura\Mvc\Controller\Error404Controller;
use Alura\Mvc\Repo\UserRepository;
use Nyholm\Psr7Server\ServerRequestCreator;

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
    unset($_SESSION['logado']);
    $_SESSION['error_message'] = 'Você deve logar antes.';
    header('location: /log');
    return;
} elseif (!isset($_SESSION['logado']) && !($pathInfo === $loginRoute)) {
    $_SESSION['error_message'] = 'Você deve logar antes.';
    header('location: /log');
    return;
}

if (array_key_exists("$httpMethod|$pathInfo", $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    if ("$httpMethod|$pathInfo" === 'POST|/log') {
        $controller = new $controllerClass($userRepository);
    } elseif ("$httpMethod|$pathInfo" === 'GET|/') {
        $controller = new $controllerClass($userRepository, $videoRepository);
    } else {
        $controller = new $controllerClass($videoRepository);
    }
} else {
    $controller = new Error404Controller($videoRepository);
}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$response = $controller->handle($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $response->getBody();
