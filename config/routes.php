<?php

use Alura\Mvc\Controller\CreateUserController;
use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\JsonVideoListController;
use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\LoginFormController;
use Alura\Mvc\Controller\LogoutController;
use Alura\Mvc\Controller\NewJsonVideoController;
use Alura\Mvc\Controller\RemoveCoverVideo;
use Alura\Mvc\Controller\VideoController;
use Alura\Mvc\Controller\VideoFormController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Controller\CreateUserFormController;

return [
    'GET|/' => VideoListController::class,
    'GET|/enviar-video' => VideoFormController::class,
    'POST|/enviar-video' => VideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/log' => LoginFormController::class,
    'POST|/log' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|/remover-capa' => RemoveCoverVideo::class,
    'GET|/videos-json' => JsonVideoListController::class,
    'POST|/videos' => NewJsonVideoController::class,
    'GET|/create-login' => CreateUserFormController::class,
    'POST|/create-login' => CreateUserController::class
];