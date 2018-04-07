<?php

include_once ROOT. './models/CategoriesModel.php';

class CategoriesController
{
	
	public function actionIndex() // выводится массив всех категорий из базы
	{
		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList();

//		require_once(ROOT.'./templates/faqs/faqs_list.php');
//		require_once(ROOT.'./templates/faqs/faqs_but.php');
			include ROOT.'/config/config.php';
			$template = $twig->loadTemplate('faqs/categories_list.twig');
			echo $template->render(array('categories'=>$CategoriesList));
			return true;
	}


	public function actionView($id) // выводится конкретная категория по id
	{

		if($id) {
			$CategoriesName = Categories::getCategoriesNamesById($id);

			require_once(ROOT.'./templates/faqs/faqs_topics.php');

		}

/*$template = $twig->loadTemplate('/faqs/faqs_but.twig');
echo $template->render(array('tops'=>$faqsTopic));
*/		return true;
	}
}
