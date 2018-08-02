<?php

require_once 'database/QueryBuilder.php';

$db = new QueryBuilder();
$db->delete("tasks", $_GET);