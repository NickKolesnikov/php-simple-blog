<?php
/**
 *
 * Контроллер главной страницы
 *
 */

include_once "../config/config.php";
include_once "../models/PostsModel.php";
include_once "../models/CommentsModel.php";

/**
 *
 * Формирование главной страницы сайта
 *
 * @param object $viewGenerator Объект шаблонизатора
 * @param object @db Объект подключения к базе данных
 *
 */
function indexAction($viewGenerator, $db){
    $rsPosts = getAllPostsWithCommentsCount($db);
    $rsPostsTop = getTopPostsWithCommentsCount($db,"5");
    $rsLastComments = getLastComments($db);
    $viewGenerator->assign('pageTitle', 'Мини блог');
    $viewGenerator->assign('rsPosts', $rsPosts);
    $viewGenerator->assign('rsPostsTop', $rsPostsTop);
    $viewGenerator->assign('rsLastComments', $rsLastComments);
    
    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'index');
    loadTemplate($viewGenerator, 'footer');
}
