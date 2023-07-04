<?php
use Alura\Mvc\Repo\VideoRepository;

$dbPath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


$repository = new VideoRepository($pdo);
$result = $repository->remove($id);

if ($result) {
    header('location: /?sucesso=1');
} else {
    header('location: /?sucesso=0');
}
