<?php
/**
 *
 * Инициализация подключения к БД
 *
 */

$dbLocation = "127.0.0.1";
$dbPort = "3306";
$dbName = "testing1";
$dbUser = "root";
$dbPass = "";

// соединяемся с БД
$db = mysqli_connect($dbLocation, $dbUser, $dbPass);

if (!$db) {
    echo "Ошибка доступа к MySQL";
    exit();
}

// устанавливаем кодировку по умолчанию для текущего соединения
$db->set_charset("utf-8");

if (!mysqli_select_db($db, $dbName)) {
    echo "Ошибка доступа к базе данных: {$dbName}";
    exit();
}
