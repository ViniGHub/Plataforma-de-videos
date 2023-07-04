<?php
declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repo\VideoRepository;
use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\VideoController;
use Alura\Mvc\Controller\VideoFormController;
use Alura\Mvc\Controller\Error404Controller;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var Controller $controller */

// var_dump($_SERVER);
$dbPath = "../banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO' ,$_SERVER)  ) {
    $controller = new VideoListController($videoRepository);

} elseif ($_SERVER['PATH_INFO'] === '/enviar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new VideoController($videoRepository);

    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-video') {
    $controller = new DeleteVideoController($videoRepository);

} elseif ($_SERVER['PATH_INFO'] === '/log') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/pages/login.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../log.php';

    }
} else {
    $controller = new Error404Controller();
}

$controller->processaRequisicao();