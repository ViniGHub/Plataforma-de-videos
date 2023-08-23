<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VideoFormController implements RequestHandlerInterface
{
    public function __construct(private VideoRepository $videoRepository, private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $getParams = $request->getQueryParams();
        $id = filter_var($getParams['id'], FILTER_VALIDATE_INT);
        $videoRepository = $this->videoRepository;

        return new Response(200, body: $this->templates->render('video-form', ['id' => $id, 'videoRepository' => $videoRepository])); 
    }
}
