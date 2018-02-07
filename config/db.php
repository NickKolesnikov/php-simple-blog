<?php
/**
 *
 * Инициализация подключения к БД
 *
 */

$dbConfig = array(
    'host'=>'127.0.0.1',
    'user'=>'root',
    'pass'=>'',
    'db'=>'testing1',
    'charset'=>'utf8'
);

$db = new SafeMySQL($dbConfig);