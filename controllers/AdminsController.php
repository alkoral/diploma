<?php
include_once ROOT. '/controllers/BaseController.php';

/**
 * Класс AdminsController - Контроллер для авторизации админа, для входа в админ. раздел и выхода из него,
 * наследует класс Base для корректного вывода шаблонов страниц
 */
class AdminsController extends Base
{
  /**
   * actionIndex - Метод для входа на главную страницу в админ. разделе
   */
	public function actionIndex()
	{
    /* Проверка на авторизацию админа */
		Admins::checkAdminLogged();

    /* Подключаем внешний вид страницы */
    $template = $this->twig->loadTemplate('admins/admins_main.twig');
    echo $template->render(array());

		return true;
	}

// ================================================================================================================= //

  /**
   * actionLogin - Метод для авторизации и входа в админ. раздел сайта
   */
	public function actionLogin()
	{
    $login = false;
    $password = false;
    $errors = false;

    /* Если форма отправлена, получаем данные из формы и передаем нужному методу */
    if (isset($_POST['submit'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];

      /**
       * Проверка на существование админа в базе с получением его id. 
       * Если данные правильные, запоминаем id пользователя в сессии и направляем на главную страницу админки
      */
      $adminId = Admins::checkAdminData($login, $password);
      if ($adminId == false) {
        $errors[] = 'Вы ввели неверные данные';
      } else {
      	Admins::getAdminSession($adminId);
        header("Location: /diploma/admins");
	}
}
    /* Подключаем внешний вид страницы */
    $template = $this->twig->loadTemplate('admins/login.twig');
    echo $template->render(array('errors'=>$errors));

		return true;
	}

// ================================================================================================================= //

  /**
   * actionLogout - Метод для удаления админа из сессии
   */
  public function actionLogout()
    {
      unset($_SESSION["admin"]);
      unset($_SESSION["admin_name"]);        
      // Перенаправляем безымянного пользователя на страницу вопросов-ответов
      header("Location: /diploma/faqs");
    }

}
