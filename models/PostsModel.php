<?php
/**
 *
 * Модель для таблицы записей (posts)
 *
 */

/**
 *
 * Получение записи по id
 *
 * @params object $db Объект подключения к БД
 * @params object $id Идентификатор записи
 */
function getPostById($db, $id)
{
    $sql = 'SELECT author, text, title, datetime
            FROM posts
            WHERE id = ?i';
    $query = $db->query($sql, $id);

    $post = mysqli_fetch_assoc($query);
    return $post;
}

/**
 *
 * Получение списка всех записей с количеством комментариев к ним
 *
 * @params object $db Объект подключения к БД
 * @params srting $textLength
 */
function getAllPostsWithCommentsCount($db, $textLength = "100")
{
    $sql = 'SELECT id, author, title, LEFT(posts.text, ?i) AS text, LENGTH(posts.text) AS text_length, datetime
            FROM posts
            ORDER BY datetime DESC';
    $query = $db->query($sql, $textLength);
    
    $rsPosts = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $commentsCount = getCommentsCountForPost($db, $row['id']);
        if ($commentsCount) {
            $row['comments_count'] = $commentsCount;
        }

        if ($row['text_length'] >= $textLength) {
            $row['text'] .= "...";
        }

        $rsPosts[] = $row;
    }

    return $rsPosts;
}

/**
 *
 * Получение самых комментируемых записей
 * @params object $db Обьект подключения к БД
 * @params string $count Количество записей
 * @params string $text_length Длина получаемого текста
 *
 */
function getTopPostsWithCommentsCount($db, $count, $text_length = "100")
{
    $sql = 'SELECT posts.id, posts.author, posts.title, LEFT(posts.text, ?i) AS text,
            LENGTH(posts.text) AS text_length, posts.datetime, COUNT(post_id) AS comments_count
            FROM posts LEFT JOIN comments
            ON posts.id = comments.post_id
            GROUP BY posts.id
            ORDER BY comments_count DESC LIMIT ?i';
    $query = $db->query($sql, $text_length, $count);

    $rsPosts = array();
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['text_length'] >= $text_length) {
            $row['text'] .= "...";
        }

        $rsPosts[] = $row;
    }

    return $rsPosts;
}

/**
 *
 * Получение количества комментариев к записи
 * @param object $db Обьект подключения к БД
 * @param string $id Идентификатор записи
 *
 */
function getCommentsCountForPost($db, $id)
{
    $sql = 'SELECT COUNT(*) as count
            FROM comments
            WHERE post_id = ?i';
    $query = $db->query($sql, $id);

    $countRs = mysqli_fetch_assoc($query);
    if ($countRs['count'] > 0) {
        $commentsCount = $countRs['count'];
    } else {
        $commentsCount = " 0";
    }
    return $commentsCount;
}

/**
 *
 * Добавление новой записи
 *
 * @param string $author Автор записи
 * @param string $title Название записи
 * @param string %text Текст записи
 *
 */
function addNewPost($author, $title, $text)
{
    require '../config/' . 'db.php'; // инициализация базы данных
    $sql = 'INSERT INTO posts
            VALUES (NULL, ?s, ?s, ?s, NOW())';
    $query = $db->query($sql, $author, $title, $text);
    
    if ($query) {
        return $db->insertId();
    } else {
        /*Запрос не удался*/
        return -1;
    }
}
