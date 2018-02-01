<?php
/**
 *
 * Файл настроек
 *
 */

// константы для обращения к контроллерам
define ('PATH_PREFIX', '../controllers/');
define ('PATH_POSTFIX', 'Controller.php');

// показывать ли ошибки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//используемый шаблон
$template = 'default';

// пути к файлам шаблонов (*.tpl)
define ('TEMPLATE_PREFIX', "../views/{$template}/");
define ('TEMPLATE_POSTFIX', ".tpl");

// пути к файлам шаблонов в вебпространстве
define('TEMPLATE_WEB_PATH', "templates/{$template}/");

// инициализация шаблонизатора
require('../library/viewGenerator.class.php');
$viewGenerator = new ViewGenerator(TEMPLATE_PREFIX);
$viewGenerator->assign('templateWebPath', TEMPLATE_WEB_PATH);
