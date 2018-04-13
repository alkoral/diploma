<?php

class Categories    // Модель для управления категориями
{

	public static function getCategoriesList() // Метод для получения массива категорий и статусов вопросов
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных

		$categoriesList = array();
		$sql = "SELECT categories.id, categories.name, count(topics.id) as total, 
						COALESCE(SUM(topics.status = '2'), 0) AS published, 
						COALESCE(SUM(topics.status = '3'), 0) AS closed, 
						COALESCE(SUM(topics.status = '1'), 0) AS no_answer 
						FROM topics RIGHT JOIN categories ON categories.id = topics.category_id GROUP BY categories.id ASC";
		$result = $db->query($sql);
		$categoriesList = $result->fetchAll(PDO::FETCH_ASSOC);
		return $categoriesList;
	}

// ================================================================================================================= //

public static function getCategoryCreate($options) // Метод для создания новой категории
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных

    $sql = "SELECT COUNT(*) FROM categories WHERE name = :name"; // Проверяем, есть ли категория с таким названием

    $result = $db->prepare($sql);
    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
    $result->execute();

    if ($result->fetchColumn()) {		// При обнаружении категории с таким же названием сообщаем об этом контроллеру
        return false;
      }
      else {
		    $sql = "INSERT INTO categories (name) VALUES (:name)"; // Вносим категорию с уникальным названием в базу
		    
		    $result = $db->prepare($sql);
		    $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
		    $result->execute();
		   	return true;
		}
	}

// ================================================================================================================= //

    public static function deleteCategoryById($id) // Метод для удаления категории с вопросами в ней
    {

      $db = DbModel::getConnection(); // Подключаемся к базе данных

      $sql = "DELETE categories, topics FROM categories LEFT JOIN topics ON topics.category_id=categories.id WHERE categories.id = :id";

      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();
      return $result->rowCount();		// Получаем кол-во удаленных строк с записями (категории + ее вопросы)
    }

// ================================================================================================================= //

	public static function getFirstCategory() // Метод для получения первого значения id в массив категорий
	{																					// Используется для корректного отображения активизированныъ панелей на главной

		$db = DbModel::getConnection(); // Подключаемся к базе данных

		$firstCategory = "";
		$sql = "SELECT id FROM categories ORDER BY id ASC LIMIT 1";

		$result = $db->query($sql);
		$firstCategory = $result;
			foreach ($firstCategory as $firstCat) {
				$first=$firstCat['id'];
			}
		return $first;
	}

// ================================================================================================================= //

	public static function getStatusesList() // Метод для получения массива статусов
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных

		$statusesList = array();
		$sql = "SELECT id, status FROM statuses";
		$result = $db->query($sql);
		$statusesList = $result->fetchAll(PDO::FETCH_ASSOC);
		return $statusesList;
	}

}