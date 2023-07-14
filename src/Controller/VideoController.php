<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;
use finfo;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $postParams = $request->getParsedBody();
        $getParams = $request->getQueryParams();
        $files = $request->getUploadedFiles();

        $url = filter_var($postParams['url'], FILTER_VALIDATE_URL);
        $titulo = $postParams['titulo'];
        $image = $files['image'];
        $id = filter_var($getParams['id'], FILTER_VALIDATE_INT);

        if (!$url || !$titulo) {
            $this->addErrorMessage('Dados do formulário inválidos.');
            return new Response(302, ['location' => '/enviar-video?id='. $id]);
        }

        $video = new Video($url, $titulo);
        if ($image->getError() === UPLOAD_ERR_OK) {
            $safeFileName = $image->getStream()->getMetaData('uri');
            $fInfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fInfo->file($safeFileName);
            $type = explode('/',$mimeType);

            if ($type[0] === 'image') {
                $prefix = uniqid();
                $image->moveTo('./img/uploads/' .$prefix . $image->getClientFilename());
                
            }
            
            $video->setFilePath($prefix .$image->getClientFilename());
        }


        if ($id == null) {
            $result = $this->videoRepository->addVideo($video);
        } else {
            $video->setId($id);
            $result = $this->videoRepository->updateVideo($video);
        }

        if ($result) {
            return new Response(302, ['location' => '/']);
        } else {
            $this->addErrorMessage('Erro ao cadastrar vídeo.');
            return new Response(302, ['location' => '/' . $_SERVER['REQUEST_URI']]);
        }
    }
}
