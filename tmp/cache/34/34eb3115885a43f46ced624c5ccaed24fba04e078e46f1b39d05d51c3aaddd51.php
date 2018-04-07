<?php

/* header_navbar.twig */
class __TwigTemplate_7938aa912931bae963076444f0975b8c6629f5248335bd9f685ae6ca2a4d66ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav class=\"navbar navbar-default\">
  <!-- определяем ширину Navbar -->
  <div class=\"row\">
    <div class=\"col-md-10\">
      <div class=\"container-fluid\">
        <!-- Заголовок -->
        <div class=\"navbar-header\">
          <!-- Кнопка «Гамбургер» отображается только в мобильном виде (предназначена для открытия основного содержимого Navbar) -->
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-main\">
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <!-- Бренд (отображается в левой части меню) -->
          <a class=\"navbar-brand\" href=\"https://www.facebook.com/groups/392078597912599/\" target=\"_blank\">Netology PHP-20</a>
        </div>
        <!-- Основная часть меню (может содержать ссылки, формы и другие элементы) -->
        <div class=\"collapse navbar-collapse\" id=\"navbar-main\">
          <!-- Содержимое основной части -->
    \t\t\t<ul class=\"nav navbar-nav\">
    \t\t\t\t<li><a href=\"faqs\">Все вопросы и ответы</a></li>
    \t\t\t\t<li><a href=\"add\">Задать вопрос</a></li>
            <li><a href=\"admins\">Раздел администратора</a></li>
          </ul>
          <ul class=\"nav navbar-nav navbar-right\">
            ";
        // line 26
        if ($this->getAttribute(($context["session"] ?? null), "admin", array())) {
            // line 27
            echo "                <p class=\"navbar-text\">Привет, <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["session"] ?? null), "admin_name", array()), "html", null, true);
            echo "</strong>!</p>
                <li><a href='logout'>Выйти</a></li>
    \t\t\t\t\t";
        } else {
            // line 30
            echo "                <li><a href='login'>Войти</a></li>
    \t\t\t\t\t";
        }
        // line 32
        echo "          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "header_navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 32,  55 => 30,  48 => 27,  46 => 26,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "header_navbar.twig", "C:\\xampp\\htdocs\\diploma\\templates\\header_navbar.twig");
    }
}
