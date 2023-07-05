<?php

$dbPath = "./banco.sqlite";
$pdo = new PDO("sqlite:$dbPath");

// $list = $pdo->query('SELECT * FROM users;')->fetchAll(PDO::FETCH_ASSOC);

// foreach ($list as $value) {
//     var_dump($value);
// }

$email = $argv[1];
$password = $argv[2];
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sqlInsert = ('INSERT INTO users (email, password) values (?, ?);');
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $email);
$statement->bindValue(2, $hash);
$result = $statement->execute();