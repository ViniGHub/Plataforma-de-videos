<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\UserRepository;
use Alura\Mvc\Repo\VideoRepository;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VideoListController implements RequestHandlerInterface
{
    public function __construct(private UserRepository $userRepository, private VideoRepository $videoRepository, private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $videoList = $this->videoRepository->all($this->userRepository->find($_SESSION['email']));
        shuffle($videoList);
        
        return new Response(200, body: $this->templates->render('video-list', ['videoList' => $videoList]));
    }
}
