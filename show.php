<?php

require_once 'database/QueryBuilder.php';

$id = $_GET;
$db = new QueryBuilder();
$task = $db->getOne("tasks", $id);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Перейти к магазину</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title"><?= $task['title']; ?></h1>
            <p>
                <?= $task['content']; ?>
            </p>
            <a href="./" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>
</body>
</html>