<?php

include_once ROOT. '/models/AdminsModel.php';

class AdminsController // Контроллер для авторизации админа, для входа в админ. раздел и выхода из него
{

	public function actionIndex() // Метод для входа на главную страницу в админ. разделе
	{
		$adminId = Admins::checkAdminLogged();
		// Если админ есть в сессии, то он направляется на главную страницу админ. раздела
		// Если нет админа, юзер направляется на страницу login (за это отвечает checkAdminLogged)

		include ROOT.'/config/config.php';
		$template = $twig->loadTemplate('admins/admins_main.twig');
		echo $template->render(array());

		return true;
	}

// ================================================================================================================= //

	public function actionLogin() // Метод для авторизации и входа в админ. раздел сайта
	{
    // Переменные для формы
    $login = false;
    $password = false;
    $errors = false;

    if (isset($_POST['submit'])) {    // Если форма отправлена...
    // ...получаем данные из формы и передаем нужному методу
      $login = $_POST['login'];
      $password = $_POST['password'];

      // Проверяем, существует ли пользователь
      $adminId = Admins::checkAdminData($login, $password); // получает id админа из $admin['id']

      if ($adminId == false) {
        // Если данные неправильные, показываем ошибку
        $errors[] = 'Вы ввели неверные данные';

      } else {
          // Если данные правильные, запоминаем id пользователя в сессии и направляем на главную страницу админки
      	Admins::getAdminSession($adminId);
        header("Location: /diploma/admins");
	}
}

    include ROOT.'/config/config.php';
    $template = $twig->loadTemplate('admins/login.twig');
    echo $template->render(array('errors'=>$errors)); // выводим маассив ошибок на странице входа

		return true;
	}

// ================================================================================================================= //

  public function actionLogout() // Метод для удаления админа из сессии
    {
      unset($_SESSION["admin"]);
      unset($_SESSION["admin_name"]);        
      // Перенаправляем безымянного пользователя на страницу вопросов-ответов
      header("Location: /diploma/faqs");
    }

}