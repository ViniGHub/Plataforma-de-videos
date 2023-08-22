<?php
$dbPath = "banco.sqlite";
try {
    
$pdo = new PDO("sqlite:$dbPath");
echo 'Conectado';

$pdo->exec('CREATE TABLE videos (
    id INTEGER PRIMARY KEY,
    url TEXT,
    title TEXT,
    image_path TEXT,
    id_user INTEGER,
    FOREIGN KEY (id_user) REFERENCES users (id)
);');
} catch (Exception $e) {
    echo $e;
}


