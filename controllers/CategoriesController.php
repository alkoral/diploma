<?php
/**
 * Подключаем файлы с необходимыми классами
 */
include_once ROOT. '/models/CategoriesModel.php';
include_once ROOT. '/controllers/BaseController.php';

/**
 * Класс CategoriesController - Контроллер для управления категориями,
 * наследует класс Base для корректного вывода шаблонов страниц
 */
class CategoriesController extends Base
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
   * actionList - Метод для вывода массива всех категорий
   * @var  array $categoriesList - массив всех категорий из базы
  */
  public function actionList()
  {
    $categoriesList = Categories::getCategoriesList();

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('categories/category_list.twig');
    echo $template->render(array('categories'=>$categoriesList));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionCreate - Метод для создания новой категории
  */
  public function actionCreate()
  {
    $success = false;

    /* Если форма отправлена, получаем данные из формы и передаем нужному методу */
    if (isset($_POST['submit'])) {
      $options['name'] = $_POST['name'];

      /* Создаем новую категорию с уникальным названием */
      $test = Categories::getCategoryCreate($options);

      if ($test) {
        $success[] = "Новая категория ".$_POST['name']." успешно внесена в базу данных";
      } else {
        $success[] = "Категория с названием ".$_POST['name']." уже есть в базе данных";
        }
    }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('categories/category_create.twig');
    echo $template->render(array('messages'=>$success));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionDelete - Метод для удаления категории и всех вопросов в ней
   * @param  integer $id - идентификатор категории, подлежащей удалению
  */
  public function actionDelete($id)
  {
    $num = false;
    /* Если форма отправлена, удаляем категорию */
    if (isset($_POST['submit'])) {
      $num = Categories::deleteCategoryById($id);
      $num = $num-1;    // Получаем кол-во удаленных вопросов в категории. 
        if ($num < 0) { // Если вопросов не было, в сообщении будет показан 0.
          $num = '0';
        }
    }

  /* Подключаем внешний вид и передаем параметры для шаблона */
  $template = $this->twig->loadTemplate('categories/category_delete.twig');
  echo $template->render(array('id'=>$id, 'num'=>$num));

  return true;
  }

}
