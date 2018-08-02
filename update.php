<?php

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

// Изменение записи из таблицы БД
$pdo = new PDO("mysql:host=localhost; dbname=db_note", "root", "");
$sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($data);

header("Location: /"); exit;