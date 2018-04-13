<?php

class Router
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

// Получаем строку URI
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

// Проверяем наличие контроллеров и экшнз и вызываем их
	public function run()
	{

    // Получаем строку запроса
		$uri = $this->getURI();

		// Проверяем наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			/* Сравниваем $uriPattern и $uri. нужно для исключения, например, слэша в тексте запроса
			$path будет выводить, например, diploma/admins/list */
			if(preg_match("~$uriPattern~", $uri)) {

/*				echo "<br>Где ищем (запрос, который набрал пользователь - uri): <b>".$uri."</b>";
				echo "<br>Что ищем (совпадение из правила - uriPattern): <b>".$uriPattern."</b>";
				echo "<br>Кто обрабатывает (строка из routes): <b>".$path."</b>";
*/
				// Получаем внутренний путь из внешнего согласно правилу.
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
//				echo '<br>Нужно сформулировать, как будет выглядеть URL к конкретному вопросу-ответу: <b>'.$internalRoute.'</b><br><br>';

				// Определяем, какой контроллер и action обрабатывают запрос
				$segments = explode("/", $internalRoute);
				array_splice($segments, 0, 1); // удаляем из массива первый элемент - название папки diploma. Вообще-то с этим нужно разобраться!!!

				// Получаем имя контроллера и поднимаем первую букву в его названии
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				// Получаем имя экшн и поднимаем первую букву в его названии
				$actionName = 'action'.ucfirst(array_shift($segments));

//				echo 'controller name: <b>'.$controllerName.'</b><br>';
//				echo 'action name: <b>'.$actionName.'</b><br>';
				$parameters = $segments;
/*				echo "<pre>";
				print_r($parameters);
*/
				// Подключаем файл класса-контроллера
				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				// Создаем новый объект, вызываем метод (т.е. action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null) {
					break;
				}
			}
		}
	}
}
