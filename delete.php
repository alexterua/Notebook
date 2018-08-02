<?php

$pdo = new PDO("mysql:host=localhost; dbname=db_note", "root", "");
$sql = "DELETE FROM tasks WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);

header("Location: /");