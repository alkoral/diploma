<?php
/**
 * Подключаем файлы с необходимыми классами
 */
include_once ROOT. '/models/UserModel.php';
include_once ROOT. '/controllers/BaseController.php';

/**
 * Класс UserController - Контроллер для управления администраторами в админке,
 * наследует класс Base для корректного вывода шаблонов страниц
 */
class UserController extends Base
{
  /**
   * __construct - служит для проверки авторизации админа
   */
  function __construct()
  {
    parent::__construct();
    Admins::checkAdminLogged();
   }

  /**
   * actionList - Метод для вывода админов
   * @var  array $userList - массив всех админов из базы
  */
  public function actionList()
  {
    $userList = User::getUserList();

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('admins/admins_list.twig');
    echo $template->render(array('users'=>$userList));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionDelete - Метод для удаления из базы конкретного админа
   * @param  integer $id - идентификатор админа, подлежащего удалению
  */
  public function actionDelete($id)
  {
    $success = false;

      /* Если форма отправлена, удаляем конкретного админа из базы */
      if (isset($_POST['submit'])) {
        $test = User::deleteUserById($id);
        if ($test) {
          $success="Администратор # $id успешно удален из базы данных";
        }
      }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('admins/admins_delete.twig');
    echo $template->render(array('id'=>$id, 'message'=>$success));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionCreate - Метод для создания нового админа
  */
  public function actionCreate()
  {
    $success = false;

    /* Если форма отправлена, получаем данные из формы */
    if (isset($_POST['submit'])) {
      $options['login'] = $_POST['login'];
      $options['password'] = $_POST['password'];

      /* заносим нового админа в базу */
      $id = User::getUserCreate($options);
      if ($id) {
        $success[] = "Новый админ ".$_POST['login']." успешно внесен в базу данных. Хотите создать еще одного админа?";
      } else {
        $success[] = "Админ с логином ".$_POST['login']." уже есть в базе данных. Выберете другой логин.";
        }
      }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('admins/admins_create.twig');
    echo $template->render(array('messages'=>$success));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionUpdate - Метод для изменения пароля админа
   * @param  integer $id - идентификатор админа, подлежащего редактированию
   * @var  array $user - массив сведений о конкретном админе
  */
  public function actionUpdate($id)
  {
    $success = false;
    $user = User::getUserById($id);

    /* Если форма отправлена, получаем данные из формы */
    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $password = $_POST['password'];
      /* Сохраняем новый пароль */
      $test = User::updateUserById($id, $password);
      if ($test) {
        $success[] = "Пароль для админа ".$_POST['login']." успешно изменен";
      }
    }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('admins/admins_update.twig');
    echo $template->render(array('users'=>$user, 'messages'=>$success));

    return true;
  }

}
