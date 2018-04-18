<?php
include_once ROOT. '/models/AdminsModel.php';

/**
 * Класс Base - родительский класс для остальных классов в контроллерах,
 * служит для корректного вывода шаблонов страниц
 */
abstract class Base
{

  protected $loader;
  protected $twig;
  public function __construct()
  {

    $this->loader = new Twig_Loader_Filesystem('templates');
    $this->twig = new Twig_Environment($this->loader);

  $this->twig->addGlobal('session', $_SESSION);
  }
  
}
