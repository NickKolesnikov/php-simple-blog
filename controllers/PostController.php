<?php
/**
 *
 * Контроллер страницы с записью
 *
 */

include_once "../config/config.php";
include_once "../models/PostsModel.php";
include_once "../models/CommentsModel.php";

/**
 *
 * Формирование страницы с записью
 *
 * @param object $viewGenerator Объект шаблонизатора
 * @param object @db Объект подключения к базе данных
 *
 */
function viewAction($viewGenerator, $db)
{
    $post_id = $_GET['id'];
    $post = getPostById($db, $post_id);
    $comments = getAllCommentsForPost($db, $post_id);
    
    $viewGenerator->assign('pageTitle', $post['title']);
    $viewGenerator->assign('post', $post);
    $viewGenerator->assign('comments', $comments);
    $viewGenerator->assign('comments_length', count($comments));

    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'post-view');
    loadTemplate($viewGenerator, 'footer');
}



/**
 *
 * Формирование страницы добавления новой записи
 *
 * @param object $viewGenerator Обьект шаблонизатора
 *
 */
function addAction($viewGenerator)
{
    $viewGenerator->assign('pageTitle', 'Новая запись');
    
    loadTemplate($viewGenerator, 'header');
    loadTemplate($viewGenerator, 'post-add');
    loadTemplate($viewGenerator, 'footer');
}

/**
 *
 * Добавление комментария к записи
 *
 */
function ajaxAddCommentAction()
{
    $post_id = isset($_REQUEST['postId']) ? $_REQUEST['postId'] : null;
    $author = isset($_REQUEST['author']) ? $_REQUEST['author'] : null;
    $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : null;

    $resData = array();
    if (addNewCommentForPost($post_id, $author, $text)) {
        $resData['success'] = 1;
    }

    echo json_encode($resData);
}

/**
 *
 * Добавление записи
 *
 */
function ajaxAddAction()
{
    $author = isset($_REQUEST['author']) ? $_REQUEST['author'] : null;
    $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
    $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : null;

    $resData = array();
    $newPost = addNewPost($author, $title, $text);
    if ($newPost !== -1) {
        $resData['success'] = 1;
        $resData['new_post_id'] = $newPost;
    }

    echo json_encode($resData);
}
