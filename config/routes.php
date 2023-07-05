<?php

use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\LoginFormController;
use Alura\Mvc\Controller\VideoController;
use Alura\Mvc\Controller\VideoFormController;
use Alura\Mvc\Controller\VideoListController;

return [
    'GET|/' => VideoListController::class,
    'GET|/enviar-video' => VideoFormController::class,
    'POST|/enviar-video' => VideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/log' => LoginFormController::class,
    'POST|/log' => LoginController::class,
];