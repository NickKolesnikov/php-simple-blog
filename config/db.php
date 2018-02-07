<?php
/**
 *
 * Инициализация подключения к БД
 *
 */

$dbLocation = "127.0.0.1";
$dbName = "testing1";
$dbUser = "root";
$dbPass = "";

$dbConfig = array(
    'host'=>'127.0.0.1',
    'user'=>'root',
    'pass'=>'',
    'db'=>'testing1',
    'charset'=>'utf8'
);

$db = new SafeMySQL($dbConfig);