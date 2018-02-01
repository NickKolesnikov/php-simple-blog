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
    $viewGenerator->assign('pageTitle', 'Мини блог');
    
    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'about');
    loadTemplate($viewGenerator, 'footer');
}
