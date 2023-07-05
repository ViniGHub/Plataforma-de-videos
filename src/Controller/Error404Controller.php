<?php
namespace Alura\Mvc\Controller;

use Alura\Mvc\Repo\VideoRepository;

class Error404Controller implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }


    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}