<?php

/* faqs/faqs_main.twig */
class __TwigTemplate_fe218caa98129b5f52d7c83883a255bddb5ad7b1b34282a0f21870aaf6c0a448 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main.twig", "faqs/faqs_main.twig", 1);
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Все вопросы и ответы";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
<div class=\"container\"> <!-- Начало контейнера -->
  <div class=\"row\"> <!-- Начало ряда -->
    <div class=\"col\"> <!-- Начало блока вопросов -->
      <h3>Вопросы и ответы</h3>

      <div class=\"tabbable\"> <!-- Начало таблицы  -->
        <ul class=\"nav nav-pills nav-stacked col-md-3\"> <!-- Начало левой колонки -->
          ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 15
            echo "            ";
            if (($this->getAttribute($context["category"], "id", array()) == 1)) {
                // line 16
                echo "              <li class=\"active\"><a href=\"#cat";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                echo "\" data-toggle=\"tab\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
                echo "</a></li>
            ";
            } else {
                // line 18
                echo "              <li><a href=\"#cat";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                echo "\" data-toggle=\"tab\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
                echo "</a></li>
            ";
            }
            // line 20
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        </ul> <!-- Конец левой колонки -->

        <div class=\"tab-content col-md-9\"> <!-- Начало правой колонки -->

        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 26
            echo "          ";
            if (($this->getAttribute($context["category"], "id", array()) == 1)) {
                // line 27
                echo "          <div class=\"tab-pane active\" id=\"cat";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                echo "\"> <!-- Начало блока вопросов и ответов для этой категории -->
          ";
            } else {
                // line 29
                echo "          <div class=\"tab-pane\" id=\"cat";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                echo "\"> <!-- Начало блока вопросов и ответов для этой категории -->
          ";
            }
            // line 31
            echo "             <h4>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</h4>
            <div class=\"panel-group\" id=\"collapse-group-";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
            echo "\"> <!-- Начало группы вопросов и ответов -->
              
        ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["topics"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 35
                echo "          ";
                if (($this->getAttribute($context["topic"], "status", array()) == 2)) {
                    // line 36
                    echo "          ";
                    if (($this->getAttribute($context["topic"], "category_id", array()) == $this->getAttribute($context["category"], "id", array()))) {
                        // line 37
                        echo "
              <div class=\"panel panel-info\"> <!-- Вопрос и ответ -->

                <div class=\"panel-heading\"> <!-- Вопрос -->
                  <a  href=\"#el";
                        // line 41
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "id", array()), "html", null, true);
                        echo "\" data-toggle=\"collapse\" data-parent=\"#collapse-group-";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "question", array()), "html", null, true);
                        echo "</a>
                </div> <!-- Конец вопроса -->
                
                <div id=\"el";
                        // line 44
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "id", array()), "html", null, true);
                        echo "\" class=\"collapse\"> <!-- Ответ -->
                  <div class=\"panel-body\">
                    ";
                        // line 46
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "answer", array()), "html", null, true);
                        echo "
                  </div>
\t\t\t\t\t\t\t\t\t<div class=\"panel-footer\"> <!-- Начало футера к вопросу -->
\t\t\t\t\t\t\t\t\t\tAuthor: ";
                        // line 49
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "author", array()), "html", null, true);
                        echo " | Email: ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "email", array()), "html", null, true);
                        echo " | Date: ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["topic"], "date", array()), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t</div> <!-- Конец футера к вопросу -->
                </div> <!-- Конец ответа -->
              </div> <!-- Конец вопроса и ответа -->
          ";
                    }
                    // line 54
                    echo "          ";
                }
                // line 55
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topic'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "
            </div> <!-- Конец группы вопросов и ответов -->
          </div> <!-- Конец блока вопросов и ответов для этой категории -->
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
        </div> <!-- Конец правой колонки -->
      </div> <!-- Конец таблицы  -->
    </div> <!-- Конец блока вопросов -->
  </div> <!-- Конец ряда -->
</div> <!-- Конец контейнера -->

";
    }

    public function getTemplateName()
    {
        return "faqs/faqs_main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 60,  170 => 56,  164 => 55,  161 => 54,  149 => 49,  143 => 46,  138 => 44,  128 => 41,  122 => 37,  119 => 36,  116 => 35,  112 => 34,  107 => 32,  102 => 31,  96 => 29,  90 => 27,  87 => 26,  83 => 25,  77 => 21,  71 => 20,  63 => 18,  55 => 16,  52 => 15,  48 => 14,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "faqs/faqs_main.twig", "C:\\xampp\\htdocs\\diploma\\templates\\faqs\\faqs_main.twig");
    }
}
