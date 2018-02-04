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
            WHERE id = ' . $id;
    $query = mysqli_query($db, $sql);

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
    $sql = 'SELECT id, author, title, LEFT(posts.text, ' . $textLength . ') AS text, LENGTH(posts.text) AS text_length, datetime
            FROM posts
            ORDER BY datetime DESC';
    $query = mysqli_query($db, $sql);

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
    $sql = 'SELECT posts.id, posts.author, posts.title, LEFT(posts.text, ' . $text_length . ') AS text,
            LENGTH(posts.text) AS text_length, posts.datetime, COUNT(post_id) AS post_count
            FROM posts LEFT JOIN comments
            ON posts.id = comments.post_id
            GROUP BY posts.id
            ORDER BY post_count DESC';

    if ($count) {
        $sql .= ' LIMIT ' . $count;
    }

    $query = mysqli_query($db, $sql);

    $rsPosts = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $commentsCount = getCommentsCountForPost($db, $row['id']);
        if ($commentsCount) {
            $row['comments_count'] = $commentsCount;
        }

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
            WHERE post_id = ' . $id;
    $query = mysqli_query($db, $sql);

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
            VALUES (NULL, "' . mysqli_real_escape_string($db, $author) . '", "' . mysqli_real_escape_string($db, $title) . '", "' . mysqli_real_escape_string($db, $text) . '", NOW())';
    
    if (mysqli_query($db, $sql)) {
        return mysqli_insert_id($db);
    } else {
        /*Запрос не удался*/
        return -1;
    }
}
