<?php

// Добавление записи в таблицу БД
$pdo = new PDO("mysql:host=localhost; dbname=db_note", "root", "");
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
$statement = $pdo->prepare($sql);
//$statement->bindParam(":title", $_POST['title']);
//$statement->bindParam(":content", $_POST['content']);
$result = $statement->execute($_POST);

header("Location: /"); exit;

