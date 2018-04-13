<?php
include_once ROOT. '/models/UserModel.php';
include_once ROOT. '/models/AdminsModel.php';

class UserController // Контроллер для управления администраторами в админке
{

	public function actionList() // Метод для вывода админов
	{
		Admins::checkAdminLogged(); // Проверяем, авторизован ли админ

		$userList = array();
		$userList = User::getUserList(); // выводится массив всех админов из базы

    include ROOT.'/config/config.php';
    $template = $twig->loadTemplate('admins/admins_list.twig');
    echo $template->render(array('users'=>$userList)); // передаем список админов на страницу вывода
    return true;
	}

// ================================================================================================================= //

  public function actionDelete($id) // Метод для удаления из базы конкретного админа
  {

    $success = false;

  	Admins::checkAdminLogged();   // Проверяем, авторизован ли админ

      if (isset($_POST['submit'])) {    // Если форма отправлена, удаляем конкретного админа из базы
        $test=User::deleteUserById($id);
        If($test) {
          $success="Администратор # $id успешно удален из базы данных";   // строковое сообщение
        }
      }

      include ROOT.'/config/config.php';
      $template = $twig->loadTemplate('admins/admins_delete.twig');
      echo $template->render(array('id'=>$id, 'message'=>$success)); // передаем id админа на страницу удаления
      return true;
  }

// ================================================================================================================= //

  public function actionCreate()  // Метод для создания нового админа
    {

    	$success = false;

    	Admins::checkAdminLogged();    // Проверяем, авторизован ли админ

      if (isset($_POST['submit'])) {
        // Если форма отправлена, получаем данные из формы
        $options['login'] = $_POST['login'];
        $options['password'] = $_POST['password'];

        $id=User::getUserCreate($options);   // заносим нового админа в базу
  	    if ($id) {
  	    	$success[]="Новый админ ".$_POST['login']." успешно внесен в базу данных. Хотите создать еще одного админа?";
  	    }
  	    	else {
  	    		$success[]="Админ с логином ".$_POST['login']." уже есть в базе данных. Выберете другой логин.";
  	    	}
      }
        include ROOT.'/config/config.php';
        $template = $twig->loadTemplate('admins/admins_create.twig');
        echo $template->render(array('messages'=>$success));
        return true;
    }

// ================================================================================================================= //

  public function actionUpdate($id) // Метод для изменения пароля админа
  {
  	$success = false;

    Admins::checkAdminLogged();   // Проверяем, авторизован ли админ

    // Получаем данные о конкретном админе
    $user = User::getUserById($id);

    if (isset($_POST['submit'])) {
      // Если форма отправлена, получаем данные из формы
      $id = $_POST['id'];
      $password = $_POST['password'];

      $test=User::updateUserById($id, $password);   // Сохраняем новый пароль
      if ($test) {
      	$success[]="Пароль для админа ".$_POST['login']." успешно изменен";
      }
    }

      include ROOT.'/config/config.php';
      $template = $twig->loadTemplate('admins/admins_update.twig');
      echo $template->render(array('users'=>$user, 'messages'=>$success)); // выводим на странице апдейта данные админа и сообщение об успешном обновлении
      return true;
  }

}