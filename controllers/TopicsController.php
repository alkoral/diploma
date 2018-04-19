<?php
/**
 * Подключаем файлы с необходимыми классами
 */
include_once ROOT. '/models/TopicsModel.php';
include_once ROOT. '/models/CategoriesModel.php';
include_once ROOT. '/controllers/BaseController.php';

/**
 * Класс TopicsController - Контроллер для управления вопросами-ответами в админке,
 * наследует класс Base для корректного вывода шаблонов страниц
 */
class TopicsController extends Base
{
  /**
   * __construct - служит для проверки авторизации админа]
   */
  function __construct()
  {
    parent::__construct();
    Admins::checkAdminLogged();
   }
  
  /**
   * actionList - Метод для вывода массива всех вопросов-ответов из базы
   * @var  array $categoriesList - массив всех категорий из базы
   * @var  array $topicsList - массив вопросов-ответов
  */
  public function actionList()
  {
    $topicsList = Topics::getTopicList();

    /* получаем массив с фильтрацией по категории и вопросов без ответов */
    if (isset($_POST['submit'])) {
      $options['filter'] = $_POST['filter'];
      if (!isset($_POST['check'])) {
        $_POST['check'] ="";
      }
      $options['check'] = $_POST['check'];

      $topicsList = Topics::getFilteredList($options);
    }

    $categoriesList = Categories::getCategoriesList();

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('topics/topics_list.twig');
    echo $template->render(array('topics'=>$topicsList, 'categories'=>$categoriesList));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionDelete - Метод для удаления конкретного вопроса из базы
   * @param  integer $id - идентификатор вопроса, подлежащего удалению
  */
  public function actionDelete($id)
  {
    $num = false;
    /* Если форма отправлена, удаляем вопрос и получаем в ответ число удаленных вопросов */      
    if (isset($_POST['submit'])) {
      $num = Topics::deleteTopicById($id);
    }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('topics/topics_delete.twig');
    echo $template->render(array('id'=>$id, 'num'=>$num));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionUpdate - Метод для редактирования конкретного вопроса
   * @param  integer $id - идентификатор вопроса, подлежащего редактированию
   * @var  array $getTopics - массив сведений о конкретном вопросе
   * @var  array $categoriesList - массив всех категорий из базы
   * @var  array $statusesList - массив всех статусов из базы
  */
  public function actionUpdate($id)
  {
    $success = false;
    $getTopics = Topics::getTopicById($id);

    /* Если форма отправлена, получаем все данные о вопросе */
    if (isset($_POST['submit'])) {
      $options['id'] = $_POST['id'];
      $options['author'] = $_POST['author'];
      $options['email'] = $_POST['email'];
      $options['category_id'] = $_POST['category_id'];
      $options['question'] = $_POST['question'];
      $_POST['answer'] = trim($_POST['answer']);
        /* не даем выводить в эфир вопросы с пустыми ответами! */
        if (empty($_POST['answer']) and $_POST['status'] == 2) {
          $_POST['status'] = "1";
          $success[] = "Внимание: вопрос без ответа не может быть опубликован";
        }
      $options['status'] = $_POST['status'];
        /* предупреждение на случай, если есть ответ, но статус "Ожидает ответа" */
        if (!empty($_POST['answer']) and $_POST['status'] == 1) {
          $success[] = "Внимание: вопрос не будет опубликован, пока вы не поменяете его статус";
        }
        /* важно для корректной фильтрации вопросов без ответов! */
        if (empty($_POST['answer'])) {
          $_POST['answer']=null;
        }
      $options['answer'] = $_POST['answer'];

      /* Вносим в базу все изменения с вопросом и выводим обновленные данные вопроса*/
      $test = Topics::updateTopicById($options);
      if ($test) {
        $getTopics = Topics::getTopicById($id);
        $success[] = "Изменения в вопрос # ".$_POST['id']." успешно внесены";
      }
    }

    $categoriesList = Categories::getCategoriesList();
    $statusesList = Categories::getStatusesList();

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('topics/topics_update.twig');
    echo $template->render(array('gettopics'=>$getTopics, 'categories'=>$categoriesList, 'statuses'=>$statusesList, 'messages'=>$success, 'id'=>$id));

    return true;
  }

}
