# diploma
Дипломная работа по курсу «PHP/SQL: back-end разработка и базы данных» / Нетология, PHP-20
(Естественно, пока сырой и тестовый вариант)


Посмотреть работоспособность черновика проекта можно тут:
http://korzun.globalreservation.com/diploma/index.php

Для проверки работоспособности проекта на локальном сервере нужно установить Twig в папку проекта (diploma). Папку с компоузером и Twig на гитхаб не заливал.

На локальном сервере проект располагается не в корневой директории, а в папке diploma. Соответственно, путь к проекту будет таким:
http://localhost/diploma/index.php
или таким:
http://localhost/diploma/faqs

Ссылка на гитхаб – тут:
https://github.com/alkoral/diploma

Гитхаб упорно не дает скопировать файл .htaccess. На всякий случай вот его содержимое:
AddDefaultCharset utf-8

RewriteEngine on
RewriteBase /diploma
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php

MySQL таблицы – в корневой директории (diploma.sql)

Логины/пароли админов такие:
admin / admin
user / user

На Нетологию не заливаю, т.к. тамошний сервер не дает запустить проект

Вопросы
1. Как настроить .htaccess или контроллеры, чтобы при входе на сайт (пока это http://localhost/diplom) автоматом открывалась страница со всеми вопросами (http://localhost/diplom/index.php или http://localhost/diplom/faqs, что одно и то же)?

2. Чтобы правильно указать контроллеру, какой шаблон выводить, в методах каждый раз приходится добавлять команду include ROOT.'/config/config.php' (например, в файле faqsController.php, строка 21 или 47), иначе возникают проблемы с определением переменной $twig. Добавление в главный файл index.php команды require_once (ROOT.'/config/config.php'); проблему не решает. Или это нормально?

Даже без ответов на эти вопросы все пока работает. Но хочется все же сделать некоторые улучшения.

Пояснения:
1. В файле config/routes.php перечислены пути как уже работающие, так и часть тех, что предполагается использовать. Так что это не окончательная версия файла.

2. Главная страница в админке (по шаблону admins_main.twig) пока в тестовом варианте. Предполагается, что слева будет колонка со ссылками на обработку админов, категорий и вопросов-ответов. Справа, соответственно, будут выводиться разные списки и проводиться все манипуляции с админами, категориями и вопросами-ответами.
