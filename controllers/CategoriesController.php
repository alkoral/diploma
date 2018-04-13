<?php
include_once ROOT. '/models/AdminsModel.php';
include_once ROOT. '/models/CategoriesModel.php';

class CategoriesController		// Контроллер для управления категориями в админке
{
	
	public function actionList() // Метод для вывода массива всех категорий
	{

		Admins::checkAdminLogged();		// Проверяем, авторизован ли админ

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // Получаем список всех категорий

		include ROOT.'/config/config.php';
		$template = $twig->loadTemplate('categories/category_list.twig');
		echo $template->render(array('categories'=>$CategoriesList)); // Передаем список категорий на соответствующую страницу
		return true;
	}

// ================================================================================================================= //

  public function actionCreate()		// Метод для создания новой категории
    {

	    $success = false;

			Admins::checkAdminLogged();		// Проверяем, авторизован ли админ

	    if (isset($_POST['submit'])) {		// Если форма отправлена, получаем данные из формы
        $options['name'] = $_POST['name'];

        $test=Categories::getCategoryCreate($options);	// Создаем новую категорию с уникальным названием

		    if ($test) {
		    	$success[]="Новая категория ".$_POST['name']." успешно внесена в базу данных";
		    }
		    	else {
		    		$success[]="Категоря с названием ".$_POST['name']." уже есть в базе данных";
		    	}
      }

      include ROOT.'/config/config.php';
      $template = $twig->loadTemplate('categories/category_create.twig');
      echo $template->render(array('messages'=>$success));
      return true;
    }

// ================================================================================================================= //

  public function actionDelete($id) // Метод для удаления категории и всех вопросов в ней
    {

    	$num=false;

			Admins::checkAdminLogged();		// Проверяем, авторизован ли админ

	    if (isset($_POST['submit'])) {	// Если форма отправлена, удаляем категорию

	      $num=Categories::deleteCategoryById($id);		// Удаляем категорию с вопросами в ней
	      $num=$num-1;		// Получаем кол-во удаленных вопросов в категории. 
	      	If($num<0) {	// Если вопросов не было, в сообщении будет показан 0.
	      		$num='0';
	      	}
	    }

	    include ROOT.'/config/config.php';
	    $template = $twig->loadTemplate('categories/category_delete.twig');
	    echo $template->render(array('id'=>$id, 'num'=>$num));
	    return true;
    }

}
