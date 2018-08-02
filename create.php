<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление записи</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Добавление записи</h1>
            <form action="store.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>