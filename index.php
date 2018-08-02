<?php

// Чтение таблицы из БД
$pdo = new PDO("mysql:host=localhost; dbname=db_note", "root", "");
$statement = $pdo->prepare("SELECT * FROM tasks");
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Все записи</h1>
            <a href="create.php" class="btn btn-success">Добавить запись</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Запись</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['id']; ?></td>
                    <td>
                        <?= $task['title']; ?>
                    </td>
                    <td>
                        <a href="show.php?id=<?= $task['id']; ?>" class="btn btn-info">Просмотр</a>
                        <a href="edit.php?id=<?= $task['id']; ?>" class="btn btn-warning">Редактировать</a>
                        <a onclick="return confirm('Вы уверены что хотите удалить запись?');" href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
                <? endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>