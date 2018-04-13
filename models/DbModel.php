<?php

Class DbModel
{
	public static function getConnection()
	{
/*
		$host = 'localhost';
		$dbname = 'diploma';
		$user = 'root';
		$password = '';
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
*/
		$paramsPath = ROOT. '/config/db_params.php';
		$params = include($paramsPath);

		$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8", $params['user'], $params['password']);

		return $db;
	}
}