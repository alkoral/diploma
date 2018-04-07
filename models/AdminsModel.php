<?php

class Admins
{

	public static function getAdminLogin() // пока тестовый метод, не используется
	{
		echo "Hi";
	}

  public static function checkAdminData($login, $password) // Метод для проверки данных админа при авторизации
  {
      // Соединение с БД
      $db = DbModel::getConnection();

      // Текст запроса к БД
      $sql = 'SELECT * FROM admins WHERE login = :login AND password = :password';

      // Получение результатов. Используется подготовленный запрос
      $result = $db->prepare($sql);
      $result->bindParam(':login', $login, PDO::PARAM_STR);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->execute();

      // Обращаемся к записи result
      $admin = $result->fetch();

      if ($admin) {
          // Если запись существует, то заносим логин админа в сессию и возвращаем id пользователя
      		$_SESSION['admin_name'] = $admin['login'];
          return $admin['id'];
      }
      return false;
  }

    public static function getAdminSession($adminId) // Метод для внесения id админа в сессию (по id = $adminId )
    {
    // Записываем идентификатор пользователя в сессию
        $_SESSION['admin'] = $adminId;
    }

    /* Возвращаеv идентификатор пользователя, если он авторизирован.
     * Иначе перенаправляет на страницу входа */
    public static function checkAdminLogged() // Метод для проверки авторизирован ли админ
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'];
        }
        // Если сессии нет, перенаправляем юзера на страницу авторизации
        header("Location: /diploma/login");
    }


    public static function getAdminsById($id) // Метод для показа конкретного админа по его id
    {
        // Соединение с БД
        $db = DbModel::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM admins WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }




}