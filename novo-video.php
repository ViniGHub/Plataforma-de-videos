<?php

$dbPath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, 'titulo');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$url || !$titulo) {
    header('location: /?sucesso=0');
    exit();
}

if ($id == null) {
    $sqlVideo = 'INSERT INTO videos (url, title) VALUES (?,?)';
    $statement = $pdo->prepare($sqlVideo);
    $statement->bindValue(1, $url);
    $statement->bindValue(2, $titulo);
} else {
    $sqlVideo = 'UPDATE videos SET url = ?, title = ? WHERE id = ?';
    $statement = $pdo->prepare($sqlVideo);
    $statement->bindValue(1, $url);
    $statement->bindValue(2, $titulo);
    $statement->bindValue(3, $id, PDO::PARAM_INT);
}

if ($statement->execute()) {
    header('location: /?sucesso=1');
} else {
    header('location: /?sucesso=0');
}

echo $_SERVER['REQUEST_URI'];
