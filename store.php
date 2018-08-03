<?php

require_once 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->add("tasks", $_POST);

// код для отправки письма


// код для отправки СМС


// код для уведомления админа


// код для уведомления определенного пользователя

header("Location: /"); exit;





