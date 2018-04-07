<?php

class Categories
{

/* Получаем список всех категорий */
	public static function getCategoriesList()
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных
		$categoriesList = array();
		$result = $db->query("SELECT * FROM categories ORDER BY id");

		$i = 0;

		while($row = $result->fetch()) {
			$CategoriesList[$i]['id'] = $row['id'];
			$CategoriesList[$i]['name'] = $row['name'];
			$i++;
			}
		return $CategoriesList;
	}

/* Получаем одну категорию по конкретному id */
	public static function getCategoriesNameById($id)
	{
		$id = intval($id);

	if ($id) {

		$db = DbModel::getConnection(); // Подключаемся к базе данных
		$result = $db->query('SELECT * FROM categories WHERE id=' . $id);

	//	$result->setFetchMode(PDO::FETCH_NUM);
		$result->setFetchMode(PDO::FETCH_ASSOC); // Выводим ключи массива по названию
		$CategoriesName = $result->fetch();
			return $CategoriesName;
		}
	}

}