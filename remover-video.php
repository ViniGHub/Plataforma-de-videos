<?php

$dbPath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");

$sqlDelete = 'DELETE FROM videos WHERE id = ?';
$statement = $pdo->prepare($sqlDelete);
$statement->bindValue(1, $_GET['id']);

if ($statement->execute()) {
    header('location: /?sucesso=1');
} else {
    header('location: /?sucesso=0');
}
