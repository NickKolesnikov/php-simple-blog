<?php
header('Content-Type: text/html; charset=utf-8');

include_once '../config/' . 'config.php'; // инициализация настроек
include_once '../library/safeMySql.class.php'; //класс для безопасной работы с MySQL
include_once '../config/' . 'db.php'; // инициализация базы данных
include_once '../library/' . 'mainFunctions.php'; //основные функции

// определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

//проверка есть ли у нас такой контроллер
$allowedControllers = array('Index', 'Info', 'Post');
if (array_search($controllerName, $allowedControllers) === false) {
    echo "404 Not found";
    exit();
}

// определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

loadPage($viewGenerator, $db, $controllerName, $actionName);
