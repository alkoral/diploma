<?php

/* faqs/faqs_add_question.twig */
class __TwigTemplate_d6c9ab8142eee7efe3a6878522686f7f25cf53e0544f71e5278da499e25acbba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("main.twig", "faqs/faqs_add_question.twig", 2);
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
        echo "Задать вопрос";
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
\t\t\t\t<h1>Задайте свой вопрос</h1>

\t\t\t\t<form role=\"form\" method=\"post\" action=\"\">

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"text\">Ваше имя</label>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"author\" value=\"\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t    <label for=\"question_email\">Ваш электронный адрес</label>
\t\t\t\t    <input type=\"email\" class=\"form-control\" name=\"email\" aria-describedby=\"emailHelp\" placeholder=\"Введите email\" required>
\t\t\t\t    <small id=\"emailHelp\" class=\"form-text text-muted\">Не волнуйтесь: мы никому не передадим ваш email.</small>
\t\t\t\t  </div>

\t\t\t\t\t<div class=\"form-group\">
  \t\t\t\t\t<label for=\"category_id\">Выберете категорию вопроса</label>
  \t\t\t\t\t\t<select class=\"form-control\" name=\"category_id\">
\t\t\t\t\t\t";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 31
            echo "\t\t\t\t\t    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t\t\t\t  </select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t  <label for=\"question\">Сформулируйте свой вопрос</label>
\t\t\t\t\t  <textarea class=\"form-control\" name=\"question\" rows=\"5\" maxlength=\"255\" required></textarea>
\t\t\t\t\t  <style type=\"text/css\">#exampleTextarea { resize: none; }</style>
\t\t\t\t\t  <small id=\"emailHelp\" class=\"form-text text-muted\">Максимум - 255 символов.</small>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Передать</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

";
    }

    public function getTemplateName()
    {
        return "faqs/faqs_add_question.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 33,  67 => 31,  63 => 30,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "faqs/faqs_add_question.twig", "C:\\xampp\\htdocs\\diploma\\templates\\faqs\\faqs_add_question.twig");
    }
}
