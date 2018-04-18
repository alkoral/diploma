<?php
/**
 * Подключаем файлы с необходимыми классами
 */
include_once ROOT. '/models/FaqsModel.php';
include_once ROOT. '/models/CategoriesModel.php';
include_once ROOT. '/controllers/BaseController.php';

/**
 * Класс FaqsController - Контроллер для вопросов-ответов в общедоступной части сайта,
 * наследует класс Base для корректного вывода шаблонов страниц
 */
class FaqsController extends Base
{
  /**
   * actionIndex - Метод для показа всех вопросос-ответов
   * @var  array $categoriesList - массив всех категорий из базы
   * @var  array $faqsList - массив всех вопрос-ответов из базы
   * @var  integer $firstCategory - id первой категории в списке категорий
  */
  public function actionIndex()
  {
    $categoriesList = Categories::getCategoriesList();
    $faqsList = Faqs::getFaqsList();
    $firstCategory = Categories::getFirstCategory();

  /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('faqs/faqs_main.twig');
    echo $template->render(array('categories'=>$categoriesList, 'topics'=>$faqsList, 'first'=>$firstCategory));

    return true;
  }

// ================================================================================================================= //

  /**
   * actionAdd - Метод для добавления в базу нового вопроса
   * @var  array $categoriesList - массив всех категорий из базы для выпадающего списка
   */
  public function actionAdd()
  {
    $categoriesList = Categories::getCategoriesList();
    $success[] = false;

    /* Если форма отправлена, получаем данные из формы и передаем нужному методу */
    if (isset($_POST['submit'])) {
      $options['author'] = $_POST['author'];
      $options['email'] = $_POST['email'];
      $options['category_id'] = $_POST['category_id'];
      $options['question'] = $_POST['question'];
      
      /* Вуаля, новый вопрос заносится в базу */
      $id = Faqs::getFaqsAdd($options);
        if ($id) {
          $success[] = "Ваш вопрос отправлен на рассмотрение. Если хотите, задайте новый вопрос.";
        }
    }

    /* Подключаем внешний вид и передаем параметры для шаблона */
    $template = $this->twig->loadTemplate('faqs/faqs_add_question.twig');
    echo $template->render(array('categories'=>$categoriesList, 'messages'=>$success));

    return true;
  }

}
