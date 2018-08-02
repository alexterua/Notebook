<?php

require_once 'database/QueryBuilder.php';

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];
$db = new QueryBuilder();
$db->update("tasks", $data);