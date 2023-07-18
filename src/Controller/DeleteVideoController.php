<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteVideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $getParams = $request->getQueryParams();

        $id = filter_var($getParams['id'], FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $this->addErrorMessage('Não foi possível encontrar o vídeo.');
            return new Response(302, ['location' => '/']);
        }
        $video = $this->videoRepository->find($id);
        $imagePath = $video->getFilePath();
        
        $result = $this->videoRepository->remove($id);

        if ($result) {
            unlink('./img/uploads/' .$imagePath);
            return new Response(302, ['location' => '/']);
        } else {
            $this->addErrorMessage('Não foi possível remover o vídeo.');
            return new Response(302, ['location' => '/']);
        }
    }
}
