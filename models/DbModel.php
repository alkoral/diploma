<?php
/**
 * Класс DbModel - Для подключения к базе данных
*/
Class DbModel
{
  private static $db;
  /**
   * getConnection - Функция для подключения к базе данных и исключения повторных подключений
  */
  public static function getConnection()
  {
    $paramsPath = ROOT. '/config/db_params.php';
    $params = include($paramsPath);

    if (self::$db === null) {
      self::$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8", $params['user'], $params['password']);
    }
    return self::$db;
  }

}
