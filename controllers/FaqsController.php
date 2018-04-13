<?php

include_once ROOT. '/models/FaqsModel.php';
include_once ROOT. '/models/CategoriesModel.php';

class FaqsController // Контроллер для вопрос-ответов в общедоступной части сайта
{

	public function actionIndex() // Метод для показа всех вопросос-ответов
	{

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // выводится массив всех категорий из базы

		$faqsList = array();
		$faqsList = Faqs::getFaqsList(); // выводится массив всех вопрос-ответов из базы

		$firstCategory = Categories::getFirstCategory(); // используется для активизации панелей в bootstrap на главной странице

		include ROOT.'/config/config.php';

			//$template = $twig->loadTemplate('faqs/faqs_main.twig');
			//echo $template->render(array('categories'=>$CategoriesList, 'topics'=>$faqsList));
		echo $twig->render('faqs/faqs_main.twig', array('categories'=>$CategoriesList, 'topics'=>$faqsList, 'first'=>$firstCategory));

		return true;
	}

// ================================================================================================================= //

	public function actionAdd() // Метод для добавления в базу нового вопроса
	{

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // получаем массив всех категорий из базы для выпадающего списка
	  
	  $success = false;

    if (isset($_POST['submit'])) {		// Если форма отправлена...
      // ...получаем данные из формы и передаем нужному методу
      $options['author'] = $_POST['author'];
      $options['email'] = $_POST['email'];
      $options['category_id'] = $_POST['category_id'];
      $options['question'] = $_POST['question'];
	    
	    $id = Faqs::getFaqsAdd($options);  // Вуаля, новый вопрос заносится в базу
		    if ($id) {
		    	$success[]="Ваш вопрос отправлен на рассмотрение. Если хотите, задайте новый вопрос.";
		    }
//			header("Location: /diploma/faqs");
		}

		include ROOT.'/config/config.php';
		/*$template = $twig->loadTemplate('faqs/faqs_add_question.twig');
		echo $template->render(array('categories'=>$CategoriesList, 'messages'=>$success));*/
		echo $twig->render('faqs/faqs_add_question.twig', array('categories'=>$CategoriesList, 'messages'=>$success));
		return true;
	}

}
