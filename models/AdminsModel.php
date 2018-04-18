<?php
/**
 * Класс Admins - Модель для авторизации пользователей
*/
class Admins
{
  /**
   * checkAdminData - Метод для проверки данных админа при авторизации
   * @param  string $login
   * @param  string $password
  */
  public static function checkAdminData($login, $password)
  {
    $sql = "SELECT id, login, password FROM admins WHERE login = :login AND password = :password";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->execute();

    $admin = $result->fetch();

    /* Если запись существует, то заносим логин админа в сессию и возвращаем id пользователя */
    if ($admin) {
      $_SESSION['admin_name'] = $admin['login'];
      return $admin['id'];
    }
    return false;
  }

// ================================================================================================================= //

  /**
   * getAdminSession - Метод для внесения id админа в сессию, для actionLogin() (по id = $adminId )
   * @param  integer $adminId
  */
  public static function getAdminSession($adminId)
  {
    $_SESSION['admin'] = $adminId;
  }

// ================================================================================================================= //

  /**
   * checkAdminLogged - Метод для проверки, авторизирован ли админ
   * Если админ запомнен в сессии, вернем идентификатор пользователя.
   * Если админа в сессии нет, перенаправляем юзера на страницу авторизации
  */
  public static function checkAdminLogged()
  {
    if (isset($_SESSION['admin'])) {
      return $_SESSION['admin'];
    }
      header("Location: /diploma/login");
  }

}
