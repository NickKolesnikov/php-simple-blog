# php-simple-blog
Это самый простой публичный блог. Любой желающий может создать тему для обсуждения или обсудить уже существующую тему.
Участие в дискуссии не требует авторизации.

## Требования:
- PHP (желательно выше 5й версии)
- База данных MySQL

## Настройка:
- Загружаем содержимое на веб-сервер
- Импортируем дамп структуры в БД (install/SQL/php_simple_blog.sql)
- Конфигурируем доступы к БД в переменных $dbName, $dbUser, $dbPass (config/db.php)
- Настраиваем содержимое страницы About (views/default/about.tpl)

## Установка через Composer:
Для установки пакета необходимо включить в свой composer.json: 
```
"require": {
  "nickkolesnikov/php-simple-blog": "dev-master"
}
```

## Посмотреть скриншоты можно по ссылкам:
Главная страница: <https://clip2net.com/s/3RAWLw6><br>
Страница добавления записи: <https://clip2net.com/s/3RAWNkF><br>
Просмотр записи: <https://clip2net.com/s/3RAWPLb><br>
Просмотр записи (2): <https://clip2net.com/s/3RAWQ7i><br>