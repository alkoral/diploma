<?php

include_once ROOT. '/models/FaqsModel.php';
include_once ROOT. '/models/CategoriesModel.php';

class FaqsController // Контроллер для вопрос-ответов
{
	
	public function actionIndex() // Метод для показа всех вопросос-ответов
	{

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // выводится массив всех категорий из базы
/* то же самое
		$CategoriesList = new Categories();
    $CategoriesList = $CategoriesList->getCategoriesList();
*/
		$faqsList = array();
		$faqsList = Faqs::getFaqsList(); // выводится массив всех вопрос-ответов из базы

include ROOT.'/config/config.php';
$template = $twig->loadTemplate('faqs/faqs_main.twig');
echo $template->render(array('categories'=>$CategoriesList, 'topics'=>$faqsList));

		return true;
	}

	public function actionAdd() // Метод для добавления в базу нового вопроса
	{

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // получаем массив всех категорий из базы для выпадающего списка

    // Обработка формы
    if (isset($_POST['submit'])) {
        // Если форма отправлена
        // Получаем данные из формы
        $options['author'] = $_POST['author'];
        $options['email'] = $_POST['email'];
        $options['category_id'] = $_POST['category_id'];
        $options['question'] = $_POST['question'];
	    
	    $id = Faqs::getFaqsAdd($options);
			header("Location: /diploma/faqs");
		}

include ROOT.'/config/config.php';
$template = $twig->loadTemplate('faqs/faqs_add_question.twig');
echo $template->render(array('categories'=>$CategoriesList));
		return true;
	}


	public function actionView($id) // Метод для показа конкретного вопроса-ответа
	{

		if($id) {
			$faqsTopic = Faqs::getFaqsTopicById($id); // выводится конкретный вопрос-ответ из базы

/*			echo "<pre>";
			print_r($faqsTopic);
			echo "</pre>";
*/
//		require_once(ROOT.'/templates/faqs/***************'); тестовая версия

// Сделать подключение к странице редактирования отдельного вопроса-ответа !!!!!!!!!!!!!!!!!!!!!!
		}

//include 'config.php';
/*$template = $twig->loadTemplate('/faqs/******.twig');
echo $template->render(array('tops'=>$faqsTopic));
*/		return true;
	}


}
