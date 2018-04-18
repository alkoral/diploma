<?php

/* Вывод ошибок */
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
define('MAINURL', "http://localhost/diploma/"); /* на всякий случай для ссылок, пока не используется */
require_once(ROOT.'/router.php');

/* Запуск сессии */
session_start();

/* Установление соединения с базой данных */
require_once(ROOT.'/models/DbModel.php');

require_once 'vendor/autoload.php';

/* Вызор рутера */
$router = new Router();
$router->run();
?>
