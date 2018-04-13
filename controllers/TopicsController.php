<?php
include_once ROOT. '/models/TopicsModel.php';
include_once ROOT. '/models/AdminsModel.php';
include_once ROOT. '/models/CategoriesModel.php';

class TopicsController		// Контроллер для управления вопросами-ответами в админке
{
	
	public function actionList() // Метод для вывода массива всех вопросов-ответов из базы
	{

		Admins::checkAdminLogged();		// Проверяем, авторизован ли админ

		$TopicsList = array();
		$TopicsList = Topics::getTopicList(); 				// получаем массив вопросов-ответов без фильтрации по категории

			if(isset($_POST['submit'])) {								
				$TopicsList = Topics::getFilteredList();	// получаем массив с фильтрацией по категории и вопросов без ответов
			}

		$CategoriesList = array();
		$CategoriesList = Categories::getCategoriesList(); // получаем массив категорий

		include ROOT.'/config/config.php';
		$template = $twig->loadTemplate('topics/topics_list.twig');
		echo $template->render(array('topics'=>$TopicsList, 'categories'=>$CategoriesList)); // направляем на страницу вопросов массивы вопросов и категорий
		return true;
	}

// ================================================================================================================= //

  public function actionDelete($id) // Метод для удаления конкретного вопроса из базы
    {

    	$num=false;
        
			Admins::checkAdminLogged();	// Проверяем, авторизован ли админ
        
	    if (isset($_POST['submit'])) {
	    	// Если форма отправлена, удаляем вопрос и получаем в ответ число удаленных вопросов
	      $num=Topics::deleteTopicById($id);
	    }

	    include ROOT.'/config/config.php';
	    $template = $twig->loadTemplate('topics/topics_delete.twig');
	    echo $template->render(array('id'=>$id, 'num'=>$num));
	    return true;
    }

// ================================================================================================================= //

  public function actionUpdate($id) // Метод для редактирования конкретного вопроса
  {
    	$success = false;

      Admins::checkAdminLogged();		// Проверяем, авторизован ли админ

      $getTopics = Topics::getTopicById($id);			// Получаем данные о конкретном вопросе

      if (isset($_POST['submit'])) {
          // Если форма отправлена, получаем все данные о вопросе
      	$options['id'] = $_POST['id'];
      	$options['author'] = $_POST['author'];
      	$options['email'] = $_POST['email'];
      	$options['category_id'] = $_POST['category_id'];

      	$options['question'] = $_POST['question'];

      	$_POST['answer']=trim($_POST['answer']);

						if(empty($_POST['answer']) and $_POST['status']==2) {			// не даем выводить в эфир вопросы с пустыми ответами! 
	      	 		$_POST['status']="1";
							$success[]="Внимание: вопрос без ответа не может быть опубликован";
	      	 	}

      	$options['status'] = $_POST['status'];

						if(!empty($_POST['answer']) and $_POST['status']==1) {		// предупреждение на случай, если есть ответ, но статус "Ожидает ответа"
							$success[]="Внимание: вопрос не будет опубликован, пока вы не поменяете его статус";
	      	 	}

	      	 	if(empty($_POST['answer'])) {					// важно для корректной фильтрации вопросов без ответов! 
	      	 		$_POST['answer']=NULL;
	      	 	}

      	$options['answer'] = $_POST['answer'];

      $test=Topics::updateTopicById($options); // Вносим в базу все изменения с вопросом

	    if ($test) {
      $getTopics = Topics::getTopicById($id);
	    	$success[]="Изменения в вопрос # ".$_POST['id']." успешно внесены";
	    }
    }
			$CategoriesList = array();
			$CategoriesList = Categories::getCategoriesList();	// получаем массив категорий

			$StatusesList = array();
			$StatusesList = Categories::getStatusesList();			// получаем массив статусов

        include ROOT.'/config/config.php';
        $template = $twig->loadTemplate('topics/topics_update.twig');
        echo $template->render(array('gettopics'=>$getTopics, 'categories'=>$CategoriesList, 'statuses'=>$StatusesList, 'messages'=>$success, 'id'=>$id));
        return true;
  }

}
