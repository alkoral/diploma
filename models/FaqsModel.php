<?php
/**
 * Класс Faqs - Модель для показа вопросов-ответов
*/
class Faqs
{
  /**
   * getFaqsList - Метод для получения списка всех топиков вопросов-ответов
   * @return array - массив всех вопросов-ответов
  */
  public static function getFaqsList()
  {
    $sql = "SELECT id, question, answer, category_id, author, email, date, status FROM topics ORDER BY category_id";
    $result = DbModel::getConnection()->query($sql);
    $faqsList = $result->fetchAll(PDO::FETCH_ASSOC);
    return $faqsList;
  }

// ================================================================================================================= //

  /**
   * getFaqsAdd - Метод для занесения в базу нового вопроса
   * @param  array $options - массив данных по вопросу для внесения в базу
  */
  public static function getFaqsAdd($options)
  {
    $sql = 'INSERT INTO topics'
            . '(author, email, category_id, question)'
            . 'VALUES '
            . '(:author, :email, :category_id, :question)';
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
    $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':question', $options['question'], PDO::PARAM_STR);

    return $result->execute();
  }

}
