<?php

class User    // Модель для управления админами
{

	public static function getUserList() // Метод для получения массива админов
	{

		$db = DbModel::getConnection();		// Подключаемся к базе данных

		$userList = array();
		$sql = "SELECT id, login, password FROM admins";
		$result = $db->query($sql);
		$userList = $result->fetchAll(PDO::FETCH_ASSOC);
		return $userList;
	}

// ================================================================================================================= //

  public static function deleteUserById($id)
  {

      $db = DbModel::getConnection();		// Подключаемся к базе данных

      $sql = "DELETE FROM admins WHERE id = :id";

      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();
      return true;
  }

// ================================================================================================================= //

	public static function getUserCreate($options) // Метод для создания нового админа
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных

    $sql = "SELECT COUNT(*) FROM admins WHERE login = :login"; // проверяем, есть ли админ с таким логином в базе

    $result = $db->prepare($sql);
    $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
    $result->execute();

    if ($result->fetchColumn()) {		// При обнаружении админа с таким же лоигном сообщаем об этом контроллеру
        return false;
      }
      else {
	    $sql = "INSERT INTO admins (login, password) VALUES (:login, :password)"; // Вносим админа с уникальным логином в базу

	    $result = $db->prepare($sql);
	    $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
	    $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
	    $result->execute();
	   	return true;
		}
	}	

// ================================================================================================================= //

    public static function getUserById($id) // Метод для показа конкретного админа по его id
    {

      $db = DbModel::getConnection(); // Подключаемся к базе данных

      $sql = "SELECT id, login, password FROM admins WHERE id = :id";

      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();
      return $result;
    }

// ================================================================================================================= //

    public static function UpdateUserById($id, $password)		// Метод для изменения пароля конкретного админа
    {

      $db = DbModel::getConnection(); // Подключаемся к базе данных

      $sql = "UPDATE admins SET password = :password WHERE id = :id";

      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->execute();
      return true;
    }

}