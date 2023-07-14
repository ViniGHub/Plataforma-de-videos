<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Error404Controller implements RequestHandlerInterface
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(404, body: http_response_code(404));
    }
}