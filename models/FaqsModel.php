<?php

class Faqs // Модель для вопросов-ответов
{

/* Получаем список всех топиков вопросов-ответов */
	public static function getFaqsList()
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных
		$faqsList = array();
		$result = $db->query("SELECT * FROM topics ORDER BY category_id");

		$i = 0;

		while($row = $result->fetch()) {
			$faqsList[$i]['id'] = $row['id'];
			$faqsList[$i]['question'] = $row['question'];
			$faqsList[$i]['answer'] = $row['answer'];
			$faqsList[$i]['category_id'] = $row['category_id'];
			$faqsList[$i]['author'] = $row['author'];
			$faqsList[$i]['email'] = $row['email'];
			$faqsList[$i]['date'] = $row['date'];
			$faqsList[$i]['status'] = $row['status'];
			$i++;
			}
		return $faqsList;
	}

/* Получаем один топик (вопрос-ответ) по конкретному id */
	public static function getFaqsTopicById($id)
	{
		$id = intval($id);

	if ($id) {

		$db = DbModel::getConnection(); // Подключаемся к базе данных
		$result = $db->query('SELECT * FROM topics WHERE id=' . $id);

	//	$result->setFetchMode(PDO::FETCH_NUM);
		$result->setFetchMode(PDO::FETCH_ASSOC); // Выводим ключи массива по названию
		$faqsTopic = $result->fetch();
			return $faqsTopic;
		}
	}

/* Заносим в базу новый вопрос */
	public static function getFaqsAdd($options)
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных
        // Текст запроса к БД
    $sql = 'INSERT INTO topics'
            . '(author, email, category_id, question)'
            . 'VALUES '
            . '(:author, :email, :category_id, :question)';

    // Получение и возврат результатов. Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
    $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':question', $options['question'], PDO::PARAM_STR);

    if ($result->execute()) {
        // Если запрос выполнен успешно, возвращаем id добавленной записи
        return $db->lastInsertId();
    }
    // Иначе возвращаем 0
    return 0;
	}

}