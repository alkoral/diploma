<?php
/**
* Класс Router - Маршрутизатор проекта
*/
class Router
{

  private $routes;
  public function __construct()
  {
    $routesPath = ROOT.'/config/routes.php';
    $this->routes = include($routesPath);
  }

/**
 * getURI - Получаем строку URI
 * @return string
 */
  private function getURI()
  {
    if (!empty($_SERVER['REQUEST_URI'])) {
    return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

/**
 * run - Проверяем наличие контроллеров и экшнз и вызываем их
 * Вызывает пользовательскую функцию с массивом параметров
 * @return boolean - Возвращает результат функции или FALSE в случае ошибки
 */
  public function run()
  {
    /* Получаем строку запроса и проверяем наличие такого пути в списке routes.php */
    $uri = $this->getURI();

    foreach ($this->routes as $uriPattern => $path) {
      if (preg_match("~$uriPattern~", $uri)) {
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

      /**
       * $segments - Определяем, какой контроллер и action обрабатывают запрос
       * @var array - $segments
       */
        $segments = explode("/", $internalRoute);
        array_splice($segments, 0, 1); // удаляем из массива первый элемент - название папки diploma.

        /**
         * $controllerName - Получаем имя контроллера и поднимаем первую букву в его названии
           $actionName - Получаем имя экшн и поднимаем первую букву в его названии
         */
        $controllerName = array_shift($segments).'Controller';
        $controllerName = ucfirst($controllerName);
        $actionName = 'action'.ucfirst(array_shift($segments));

        $parameters = $segments;
        /**
         * $controllerFile - Подключаем файл класса-контроллера
         * @var string - $controllerFile
         */
        $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
        if (file_exists($controllerFile)) {
          include_once($controllerFile);
        }

        /**
         * $controllerObject - Создаем новый объект, вызываем метод (т.е. action)
         */
        $controllerObject = new $controllerName;
        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

        if ($result != null) {
          break;
        }
      }
    }
  }
}
