<?php

class Topics   // Модель для управления вопросами и ответами
{

	public static function getTopicList() // Метод для получения массива всех вопросов-ответов
	{

		$db = DbModel::getConnection(); // Подключаемся к базе данных

    // Делаем выборку для вопросов-ответов из трех таблиц для их полного отображения
    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
          FROM topics AS t1, categories AS t2, statuses AS t3 
          WHERE t1.category_id = t2.id AND t1.status = t3.id ORDER BY t1.id ASC";
		$result = $db->prepare($sql);
		$result->execute();
		return $result;
	}

// ================================================================================================================= //

  public static function getFilteredList() // Метод для получения массива всех вопросов-ответов с фильтрацией по категориям
  {

    $db = DbModel::getConnection(); // Подключаемся к базе данных

    if (!isset($_POST['check'])) {  // Проверяем, включена ли фильтрация по вопросам без ответов
      $_POST['check'] ="";
    }

    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
          FROM topics AS t1, categories AS t2, statuses AS t3 
          WHERE t1.category_id = t2.id AND t1.status = t3.id AND t1.category_id ".$_POST['filter']." ".$_POST['check']." ORDER BY t1.id ASC";
      $result = $db->prepare($sql);
      $result->execute();
      return $result;
  }

// ================================================================================================================= //

  public static function deleteTopicById($id)   // Метод для удаления конкретного вопроса
  {

    $db = DbModel::getConnection(); // Подключаемся к базе данных

    $sql = "DELETE FROM topics WHERE id = :id";

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->rowCount();		// Получаем кол-во удаленных строк
  }

// ================================================================================================================= //

  public static function getTopicById($id) // Метод для показа конкретного вопроса по его id
  {

    $db = DbModel::getConnection();   // Подключаемся к базе данных

    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
			      FROM topics AS t1, categories AS t2, statuses AS t3 
			      WHERE t1.category_id = t2.id AND t1.status = t3.id AND t1.id = :id";

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result;
}
  
// ================================================================================================================= //

  public static function UpdateTopicById($options)	// Метод для модифицации конкретного вопроса по его id
  {

    $db = DbModel::getConnection();   // Подключаемся к базе данных

    $sql = "UPDATE topics SET author = :author, email = :email, category_id = :category_id, 
            status = :status, question = :question, answer = :answer WHERE id = :id";

    $result = $db->prepare($sql);
    $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
    $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
    $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':question', $options['question'], PDO::PARAM_STR);
    $result->bindParam(':answer', $options['answer'], PDO::PARAM_STR);
    $result->execute();
    return true;
  }

}