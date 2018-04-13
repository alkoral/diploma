<?php

class Admins    // Модель для авторизации пользователей
{

  public static function checkAdminData($login, $password) // Метод для проверки данных админа при авторизации
  {

    $db = DbModel::getConnection();   // Подключаемся к базе данных

    $sql = "SELECT id, login, password FROM admins WHERE login = :login AND password = :password";

    $result = $db->prepare($sql);       // Получение и возврат результатов с помощью подготовленного запроса
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->execute();

    $admin = $result->fetch();    // Обращаемся к записи $result

    if ($admin) {
  		$_SESSION['admin_name'] = $admin['login'];  // Если запись существует, то заносим логин админа в сессию и возвращаем id пользователя
      return $admin['id'];
    }
    return false;
  }

// ================================================================================================================= //

  public static function getAdminSession($adminId) // Метод для внесения id админа в сессию, для actionLogin() (по id = $adminId )
  {
  // Записываем идентификатор пользователя в сессию
    $_SESSION['admin'] = $adminId;
  }

// ================================================================================================================= //

  public static function checkAdminLogged() // Метод для проверки: авторизирован ли админ?
  {

    if (isset($_SESSION['admin'])) {      // Если админ запомнен в сессии, вернем идентификатор пользователя
      return $_SESSION['admin'];
    }
      header("Location: /diploma/login"); // Если админа в сессии нет, перенаправляем юзера на страницу авторизации
  }

}