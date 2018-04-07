<?php

/* admins/login.twig */
class __TwigTemplate_d44e02a8b5f8c84d79e0ffa3ba0bc54fd6444596b3d062c1518ed50e8d0d3d84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("main.twig", "admins/login.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Вход в админ. раздел";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
<div class=\"section\">
\t<div class=\"container\">
\t\t<div class=\"row\">

\t\t\t<div class=\"col-md-6\">
\t\t\t\t<h1>Вход в раздел администратора</h1>
\t\t\t\t
\t\t\t\t\t";
        // line 15
        if ( !twig_test_empty(($context["errors"] ?? null))) {
            // line 16
            echo "            <ul>
\t            ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 18
                echo "\t              <li> <font color=red>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</font> </li>
\t            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "            </ul>
\t\t\t\t\t";
        }
        // line 22
        echo "
\t\t\t\t<form role=\"form\" method=\"post\" action=\"login\">

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"login\">Ваш логин</label>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"login\" placeholder=\"Введите логин\" value=\"\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t    <label for=\"password\">Ваш пароль</label>
\t\t\t\t    <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Введите пароль\" required>
\t\t\t\t  </div>

\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Войти</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

";
    }

    public function getTemplateName()
    {
        return "admins/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 22,  66 => 20,  57 => 18,  53 => 17,  50 => 16,  48 => 15,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admins/login.twig", "C:\\xampp\\htdocs\\diploma\\templates\\admins\\login.twig");
    }
}
