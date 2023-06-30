<?php

$dbPath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");
echo 'Conectado' . PHP_EOL;

// $pdo->exec('DELETE FROM videos WHERE id = 2;');

// exit();
// $pdo->exec('CREATE TABLE IF NOT EXISTS videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);');

$statement = $pdo->query('SELECT * FROM videos');
$list = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($list as $l) {
    var_dump($l);
}