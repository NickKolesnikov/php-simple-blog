<?php
/**
 *
 * Основные функции
 *
 */

/**
 * Формирование запрашиваемой страницы
 *
 * @param object $viewGenerator объект шаблонизатора
 * @param object $db обьект подключения к БД
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы
 *
 */
function loadPage($viewGenerator, $db, $controllerName, $actionName = 'index')
{
    include_once PATH_PREFIX . $controllerName . PATH_POSTFIX;
    
    //проверка есть ли у нас такой экшн
    if (!function_exists($actionName . 'Action')) {
        echo "404 Not found";
        exit();
    }
    
    $function = $actionName . 'Action';
	$function($viewGenerator, $db);
}

/**
 *Загрузка шаблона
 *
 * @param object $viewGenerator Объект шаблонизатора
 * @param string $templateName Название шаблона
 *
 */
function loadTemplate($viewGenerator, $templateName)
{
    $viewGenerator->display($templateName . TEMPLATE_POSTFIX);
}

/**
 *
 * Функция отладки. Выводит содержимое переменной $value, если $die=1 останавливает дальнейшее выполнение
 *
 * @param variant $value Переменная, содержимое которой необходимо вывести
 * @param bool $die Останавливать ли дальнейшее выполнение скрипта после вывода
 *
 */
function d($value = null, $die = TRUE)
{
    echo "Debug <br /><pre>";
    print_r($value);
    echo '</pre>';

    if ($die) {
        die();
    }
}

/**
 *
 * Функция очистки POST
 *
 * @param $val Имя пост переменной
 */
function cleanPost($val) {
    function cleanPost($val) {
        if(!isset($_POST[$val])) {
            $_POST[$val] = NULL;
            return;
        }
        $_POST[$val] = trim(htmlentities($_POST[$val], ENT_QUOTES, 'UTF-8'));
    }
}
