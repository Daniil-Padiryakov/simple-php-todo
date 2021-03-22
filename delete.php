<?php

require 'config/DB.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM `todo` where id = :id');
$stmt->execute(['id' => $id]);

header('Location: /');