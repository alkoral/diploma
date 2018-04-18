<?php
/**
 * Класс Categories - Модель для управления категориями
*/
class Categories
{

  /**
   * getCategoriesList - Метод для получения массива категорий и статусов вопросов
   * @return array - массив всех категорий из базы
  */
  public static function getCategoriesList()
  {
    $sql = "SELECT categories.id, categories.name, count(topics.id) as total, 
            COALESCE(SUM(topics.status = '2'), 0) AS published, 
            COALESCE(SUM(topics.status = '3'), 0) AS closed, 
            COALESCE(SUM(topics.status = '1'), 0) AS no_answer 
            FROM topics RIGHT JOIN categories ON categories.id = topics.category_id GROUP BY categories.id ASC";
    $result = DbModel::getConnection()->query($sql);
    $categoriesList = $result->fetchAll(PDO::FETCH_ASSOC);
    return $categoriesList;
  }

// ================================================================================================================= //

  /**
   * getCategoryCreate - Метод для создания новой категории
   * @param  array $options - предполагается массив данных для занесения в базу (тут - один параметр name)
  */
  public static function getCategoryCreate($options)
  {
    /* Проверяем, есть ли категория с таким названием */
    $sql = "SELECT COUNT(*) FROM categories WHERE name = :name";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->execute();

    /* При обнаружении категории с таким же названием сообщаем об этом контроллеру
      Если нет, вносим категорию с уникальным названием в базу */
    if ($result->fetchColumn()) {
        return false;
      } else {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $result = DbModel::getConnection()->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->execute();
        return true;
    }
  }

// ================================================================================================================= //

  /**
   * deleteCategoryById - Метод для удаления категории с вопросами в ней
   * @param  integer $id - идентификатор категории
   * @return integer - кол-во удаленных строк с записями (категории + ее вопросы)
  */
  public static function deleteCategoryById($id)
  {
    $sql = "DELETE categories, topics FROM categories LEFT JOIN topics ON topics.category_id=categories.id WHERE categories.id = :id";
    $result = DbModel::getConnection()->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->rowCount();
  }

// ================================================================================================================= //

  /**
   * getFirstCategory - Метод для получения первого значения id в массиве категорий
   * Используется для корректного отображения активных панелей на главной странице проекта
   * @return integer - id первой категории в списке категорий
  */
  public static function getFirstCategory()
  {
    $sql = "SELECT id FROM categories ORDER BY id ASC LIMIT 1";
    $result = DbModel::getConnection()->query($sql);
    $firstCategory = $result;
      foreach ($firstCategory as $firstCat) {
        $first = $firstCat['id'];
      }
    return $first;
  }

// ================================================================================================================= //

  /**
   * getStatusesList - Метод для получения массива статусов
   * @return array - список статусов
  */
  public static function getStatusesList()
  {
    $sql = "SELECT id, status FROM statuses";
    $result = DbModel::getConnection()->query($sql);
    $statusesList = $result->fetchAll(PDO::FETCH_ASSOC);
    return $statusesList;
  }

}
