<?php
/**
 *
 * Модель для таблицы комментариев (comments)
 *
 */

/**
 *
 * Получение списка всех комментариев к записи
 *
 * @params object $db Объект подключения к БД
 * @params string $id Идентификатор записи
 *
 */
function getAllCommentsForPost($db, $id)
{
    $sql = 'SELECT id, author, text, datetime FROM comments WHERE post_id = ' . $id;
    $query = mysqli_query($db, $sql);

    $rsComments = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $rsComments[] = $row;
    }

    return $rsComments;
}

/**
 *
 * Добавление нового комментария к записи
 * @param string $id Идентификатор записи
 * @param string $name Автор комментария
 * @param string %text Текст комментария
 *
 */
function addNewCommentForPost($id, $author, $text)
{
    require '../config/' . 'db.php'; // инициализация базы данных
    $sql = 'INSERT INTO comments VALUES (NULL, ' . $id . ', "' . mysqli_real_escape_string($db, $author) . '", "' . mysqli_real_escape_string($db, $text) . '", NOW())';

    if (mysqli_query($db, $sql)) {
        return 1;
    } else {
        return 0;
    }
}

/**
 *
 * Получение списка последних комментариев
 *
 * @params object $db Объект подключения к БД
 * @params string $count Количество комментариев
 * @params string $text_length Длина получаемого текста
 *
 */
function getLastComments($db, $count = "10", $text_length = "100")
{
    $sql = "SELECT id, post_id, author, LEFT(comments.text, $text_length) AS text, LENGTH(comments.text) AS text_length FROM comments ORDER BY datetime DESC LIMIT " . $count;
    $query = mysqli_query($db, $sql);

    $rsComments = array();
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['text_length'] >= $text_length) {
            $row['text'] .= "...";
        }

        $rsComments[] = $row;
    }

    return $rsComments;
}
