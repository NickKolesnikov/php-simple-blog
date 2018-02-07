<?php
/**
 *
 * Контроллер инфо-страниц
 *
 */

include_once "../config/config.php";

/**
 *
 * Формирование страницы About
 *
 * @param object $viewGenerator Объект шаблонизатора
 *
 */
function aboutAction($viewGenerator){
    $viewGenerator->assign('pageTitle', 'О проекте');
    
    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'about');
    loadTemplate($viewGenerator, 'footer');
}

/**
 *
 * Формирование страницы 404
 *
 * @param object $viewGenerator Объект шаблонизатора
 *
 */
function notFoundAction($viewGenerator){
    $viewGenerator->assign('pageTitle', 'Страница не найдена');
    
    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'notfound');
    loadTemplate($viewGenerator, 'footer');
}
