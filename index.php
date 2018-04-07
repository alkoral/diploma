<?php

// FRONT COTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
define('MAINURL', "http://localhost/diploma/"); // на всякий случай для ссылок. Пока не используется
require_once(ROOT.'/router.php');

session_start();

// 3. Установка соединения с БД
require_once(ROOT.'/models/DbModel.php');

// 4. Вызор Router

$router = new Router();
$router->run();
?>
