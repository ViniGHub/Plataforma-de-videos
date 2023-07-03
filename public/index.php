<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

// var_dump($_SERVER);

if (!array_key_exists('PATH_INFO' ,$_SERVER)  ) {
    require_once __DIR__ . '/pages/listagem-videos.php';
} elseif (str_contains($_SERVER['PATH_INFO'], '/enviar-video')) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/pages/enviar-video.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../novo-video.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-video') {
    require_once __DIR__ . '/../remover-video.php';
} elseif ($_SERVER['PATH_INFO'] === '/log') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/pages/login.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../log.php';
    }
} else {
    http_response_code(404);
}