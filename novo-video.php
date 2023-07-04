<?php
use Alura\Mvc\entity\Video;
use Alura\Mvc\Repo\VideoRepository;

$dbPath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$repository = new VideoRepository($pdo);

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, 'titulo');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$url || !$titulo) {
    header('location: /?sucesso=0');
    exit();
}
$video = new Video($url, $titulo);

if ($id == null) {
    $result = $repository->addVideo($video);
} else {
    $video->setId($id);
    $result = $repository->updateVideo($video);
}

if ($result) {
    header('location: /?sucesso=1');
} else {
    header('location: /?sucesso=0');
}

// echo $_SERVER['REQUEST_URI'];
