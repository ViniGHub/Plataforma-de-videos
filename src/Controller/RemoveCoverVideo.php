<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveCoverVideo implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository) 
    {
        
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $getParams = $request->getQueryParams();
        $id = filter_var($getParams['id'], FILTER_VALIDATE_INT);
        $video = $this->videoRepository->find($id);

        $filePath = './img/uploads/' . $video->getFilePath();
        $result = $this->videoRepository->removeCover($id);

        if ($result) {
            unlink($filePath);
            return new Response(302, ['location' => '/']);
        }
        $this->addErrorMessage('Não foi possivel remover a capa do vídeo.');
        return new Response(302, ['location' => '/']);

    }
}
