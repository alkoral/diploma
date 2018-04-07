<?php

$host = '127.0.0.1';
$dbname = 'diploma';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $sql1 = "

    DROP TABLE IF EXISTS `statuses`;
    CREATE TABLE `statuses` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `status` VARCHAR(50) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
    echo $db->prepare($sql1)->execute() ? 'Таблица statuses создана' : 'Ошибка при создании таблицы';
    echo '<br>';

    $sql3 = "SELECT * FROM statuses";
    echo 'Содержание таблицы statuses:';
    echo '<pre>';
    $statement = $db->prepare($sql3);
    $statement->execute();
    var_dump($statement->fetchAll(PDO::FETCH_ASSOC));

} catch (Exception $e) {
    die('Error: ' . $e->getMessage() . '<br>');
}
?>