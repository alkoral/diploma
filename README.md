# diploma

Посмотреть работоспособность проекта можно тут: http://korzun.globalreservation.com/diploma/

Работа представляет собой онлайн-сервис вопросов и ответов. Сервис предоставляет возможность любому пользователю задать вопрос по интересующей его теме, а также ознакомиться с уже опубликованными вопросами и ответами на них, сгруппированными по темам (категориям).

Для управления контентом сайта и авторизованными пользователями (администраторами) разработан интерфейс администратора с широким набором возможностей по созданию, редактированию и удалению администраторов, категорий и вопросов.

Система реализована на языке PHP с использованием архитектуры MVC и принципов ООП. Для создания оригинального внешнего вида пользовательского и административного интерфейсов используются шаблонизатор Twig и фреймворк Bootstrap. Хранение данных и манипуляции с ними осуществляются в СУБД MySQL.

Подробное описание проекта: https://docs.google.com/document/d/1e5DU_9bSO1TdJl26vhNjDiP4gajHAGy_d3KH9kQm640/

Инструкция по установке и первому запуску

Для корректной работы проекта необходимо:
1) скопировать в корневую директорию сервера папку diploma с ее содержимым,
2) установить в эту папку композер (Composer) и шаблонизатор Twig,
3) загрузить в базу данных дамп faq.sql (при этом название базы должно быть diploma),
4) настроить подключение к базе данных в файле db_params.php (находится в папке config).

Вызов сервиса производится по адресу: site_name/diploma (например, http://localhost/diploma)
