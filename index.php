<?php

// Вывод ошибок

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключение файлов системы

define('ROOT', dirname(__FILE__));
define('MAINURL', "http://localhost/diploma/"); // на всякий случай для ссылок. Пока не используется
require_once(ROOT.'/router.php');
session_start();

// Установка соединения с БД
require_once(ROOT.'/models/DbModel.php');

// Вызор рутера

$router = new Router();
$router->run();
?>
