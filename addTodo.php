<?php

require 'config/DB.php';

$todo = $_POST['todo'];

$stmt = $pdo->prepare('INSERT INTO todo(title) VALUES(:todo)');
$stmt->execute(['todo' => $todo]);

header('Location: /');