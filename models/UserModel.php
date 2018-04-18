<?php
/**
 * Класс User - Модель для управления админами
 */
class User
{

  /**
   * getUserList - Метод для получения массива админов
   * @return array - массив всех админов
  */
  public static function getUserList()
  {
    $sql = "SELECT id, login, password FROM admins";
    $result = DbModel::getConnection()->query($sql);
    $userList = $result->fetchAll(PDO::FETCH_ASSOC);
    return $userList;
  }

// ================================================================================================================= //

  /**
   * deleteUserById - Метод для удаления админа по его id
   * @param  integer $id - идентификатор админа
  */
  public static function deleteUserById($id)
  {
    $sql = "DELETE FROM admins WHERE id = :id";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return true;
  }

// ================================================================================================================= //

  /**
   * getUserCreate - Метод для создания нового админа
   * @param  array $options - массив данных нового админа
  */
  public static function getUserCreate($options)
  {
    /* Проверяем, есть ли админ с таким логином в базе */
    $sql = "SELECT COUNT(*) FROM admins WHERE login = :login";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
    $result->execute();

    /* Если есть админ с таким же логином, сообщаем об этом контроллеру, если нет - заносим в базу */
    if ($result->fetchColumn()) {
      return false;
      } else {
      $sql = "INSERT INTO admins (login, password) VALUES (:login, :password)";
      $result = DbModel::getConnection()->prepare($sql);
      $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
      $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
      $result->execute();
      return true;
    }
  } 

// ================================================================================================================= //

  /**
   * getUserById - Метод для показа конкретного админа по его id
   * @param  integer $id - идентификатор админа
   * @return array - массив данных админа
  */
  public static function getUserById($id)
  {
    $sql = "SELECT id, login, password FROM admins WHERE id = :id";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result;
  }

// ================================================================================================================= //

  /**
   * updateUserById - Метод для изменения пароля конкретного админа
   * @param  integer $id - идентификатор админа
   * @param  string $password - новый пароль
   * @return array - должен быть массив (тут - одно значение)
  */
  public static function updateUserById($id, $password)
  {
    $sql = "UPDATE admins SET password = :password WHERE id = :id";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->execute();
    return true;
  }

}
