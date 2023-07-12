<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repo\VideoRepository;
use finfo;

class VideoController implements Controller
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, 'titulo');
        $image = $_FILES['image'];
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$url || !$titulo) {
            $this->addErrorMessage('Dados do formulário inválidos.');
            header('location: /enviar-video?id='. $id);
            exit();
        }

        $video = new Video($url, $titulo);
        if ($image['error'] === UPLOAD_ERR_OK) {
            $safeFileName = pathinfo($image['name'], PATHINFO_BASENAME);
            $fInfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fInfo->file($image['tmp_name']);

            if (str_starts_with('image/', $mimeType)) {
                move_uploaded_file($image['tmp_name'], './img/uploads/' . $safeFileName);
                
            }
            $video->setFilePath($image['name']);
        }


        if ($id == null) {
            $result = $this->videoRepository->addVideo($video);
        } else {
            $video->setId($id);
            $result = $this->videoRepository->updateVideo($video);
        }

        if ($result) {
            header('location: /');
        } else {
            $this->addErrorMessage('Erro ao cadastrar vídeo.');
            header('location: /' . $_SERVER['REQUEST_URI']);
        }
    }
}
