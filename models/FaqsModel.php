<?php

class Faqs // Модель для показа вопросов-ответов
{

	public static function getFaqsList() // Метод для получения списка всех топиков вопросов-ответов
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных
		$faqsList = array();
		$sql = "SELECT id, question, answer, category_id, author, email, date, status FROM topics ORDER BY category_id";
		$result = $db->query($sql);
		$faqsList = $result->fetchAll(PDO::FETCH_ASSOC);
		return $faqsList;
	}

// ================================================================================================================= //


	public static function getFaqsAdd($options) // Метод для занесения в базу нового вопроса
	{
		$db = DbModel::getConnection(); // Подключаемся к базе данных
    $sql = 'INSERT INTO topics'
            . '(author, email, category_id, question)'
            . 'VALUES '
            . '(:author, :email, :category_id, :question)';

    $result = $db->prepare($sql);		    // Получение и возврат результатов с помощью подготовленного запроса
    $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
    $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':question', $options['question'], PDO::PARAM_STR);

    return $result->execute();
	}

}