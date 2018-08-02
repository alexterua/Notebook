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
    <title>Редактирование записи</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Редактирование записи</h1>
            <form action="update.php?id=<?= $task['id']; ?>" method="post">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?= $task['title']; ?>">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"><?= $task['content']; ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>