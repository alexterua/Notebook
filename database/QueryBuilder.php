<?php

class QueryBuilder
{
    public $pdo;

    public function __construct()
    {
        // Подключение к БД
        $this->pdo = new PDO("mysql:host=localhost; dbname=db_note", "root", "");
    }

    // Список задач
    public function getAll($table) {

        // Чтение таблицы из БД
        $sql = "SELECT * FROM $table";
        // Подготовка запроса
        $statement = $this->pdo->prepare($sql);
        // Выполнение запроса
        $statement->execute();
        // Получить задачи в виде ассоц. массива
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // Сохранение новой задачи
    public function add($table, $data) {
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(', ', $keys);
        // 3. Сформировать метки
        $placeholders = ':' . implode(', :', $keys);
        // Добавление записи в таблицу БД
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        // Подготовка запроса
        $statement = $this->pdo->prepare($sql);
        //$statement->bindParam(":title", $_POST['title']);
        //$statement->bindParam(":content", $_POST['content']);
        // Выполнение запроса с параметрами
        $statement->execute($data);
    }

    // Вывод одной задачи
    public function getOne($table, $id) {
        // Чтение одной записи по id из таблицы БД
        $sql = "SELECT * FROM $table WHERE id=:id";
        // Подготовка запроса
        $statement = $this->pdo->prepare($sql);
        // Выполнение запроса с параметрами
        $statement->execute($id);
        // Получить задачу в виде ассоц. массива
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Изменение/Обновление существующей задачи
    public function update($table, $data) {
        // Получаем строку вида "id=:id,title=:title,content=:content"
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . '=:' . $key . ",";
        }
        $fields = rtrim($fields, ',');
        // Изменение записи из таблицы БД
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        // Подготовка запроса
        $statement = $this->pdo->prepare($sql);
        // Выполнение запроса с параметрами
        $statement->execute($data);
    }

    //Удаление задачи
    public function delete($table, $data) {
        // Удаление записи из таблицы БД
        $sql = "DELETE FROM $table WHERE id=:id";
        // Подготовка запроса
        $statement = $this->pdo->prepare($sql);
        // Выполнение запроса с параметрами
        $statement->execute($data);
    }
}