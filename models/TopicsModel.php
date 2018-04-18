<?php
/**
 * Класс Topics - Модель для управления вопросами и ответами
*/
class Topics
{

  /**
   * getTopicList - Метод для получения массива всех вопросов-ответов
   * Получаем выборкой из трех таблиц для полного отображения вопросов-ответов
   * @return array - массив вопросов-ответов
  */
  public static function getTopicList()
  {
    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
          FROM topics AS t1, categories AS t2, statuses AS t3 
          WHERE t1.category_id = t2.id AND t1.status = t3.id ORDER BY t1.id ASC";
    $result = DbModel::getConnection()->prepare($sql);
    $result->execute();
    return $result;
  }

// ================================================================================================================= //

  /**
   * getFilteredList - Метод для получения массива всех вопросов-ответов с фильтрацией по категориям
   * @return array - массив отфильтрованных вопросов-ответов
  */
  public static function getFilteredList()
  {
    if (!isset($_POST['check'])) {
      $_POST['check'] ="";
    }

    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
          FROM topics AS t1, categories AS t2, statuses AS t3 
          WHERE t1.category_id = t2.id AND t1.status = t3.id AND t1.category_id ".$_POST['filter']." ".$_POST['check']." ORDER BY t1.id ASC";
    $result = DbModel::getConnection()->prepare($sql);
    $result->execute();
    return $result;
  }

// ================================================================================================================= //

  /**
   * deleteTopicById - Метод для удаления конкретного вопроса
   * @param  integer $id - идентификатор вопроса, подлежащего удалению
   * @return integer - количество удаленных строк (тут одна)
  */
  public static function deleteTopicById($id)
  {
    $sql = "DELETE FROM topics WHERE id = :id";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->rowCount();
  }

// ================================================================================================================= //

  /**
   * getTopicById - Метод для показа конкретного вопроса по его id
   * @param  integer $id - идентификатор вопроса
   * @return array - массив всех данных вопроса с выборкой из трех таблиц
  */
  public static function getTopicById($id)
  {
    $sql = "SELECT t1.*, t2.name AS cat_name, t3.status AS stat_name 
            FROM topics AS t1, categories AS t2, statuses AS t3 
            WHERE t1.category_id = t2.id AND t1.status = t3.id AND t1.id = :id";

    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result;
}
  
// ================================================================================================================= //

  /**
   * updateTopicById - Метод для модифицации конкретного вопроса по его id
   * @param  array $options - массив всех данных вопроса для внесения в базу
  */
  public static function updateTopicById($options)
  {
    $sql = "UPDATE topics SET author = :author, email = :email, category_id = :category_id, 
            status = :status, question = :question, answer = :answer WHERE id = :id";

    $result = DbModel::getConnection()->prepare($sql);
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
