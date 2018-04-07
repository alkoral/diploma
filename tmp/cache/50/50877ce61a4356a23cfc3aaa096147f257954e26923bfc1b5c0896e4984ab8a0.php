<?php

/* main.twig */
class __TwigTemplate_94ac01be77fc51ae94196c26293ff54d696af950e08454e3e5b44b680bf1da3b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'title' => array($this, 'block_title'),
            'header_navbar' => array($this, 'block_header_navbar'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('header', $context, $blocks);
        // line 4
        echo "
<title>
\t\t";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        // line 9
        echo "</title>
</head>
<body>

<div id=\"content\">
\t\t";
        // line 14
        $this->displayBlock('header_navbar', $context, $blocks);
        // line 17
        echo "
  ";
        // line 18
        $this->displayBlock('content', $context, $blocks);
        // line 22
        echo "</div>

";
        // line 24
        $this->displayBlock('footer', $context, $blocks);
    }

    // line 1
    public function block_header($context, array $blocks = array())
    {
        // line 2
        $this->loadTemplate("header.twig", "main.twig", 2)->display($context);
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        // line 7
        echo "\t\t\tДипломная работа
\t\t";
    }

    // line 14
    public function block_header_navbar($context, array $blocks = array())
    {
        // line 15
        echo "\t\t\t";
        $this->loadTemplate("header_navbar.twig", "main.twig", 15)->display($context);
        // line 16
        echo "\t\t";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "\t\tsome content

  ";
    }

    // line 24
    public function block_footer($context, array $blocks = array())
    {
        // line 25
        echo "\t";
        $this->loadTemplate("footer.twig", "main.twig", 25)->display($context);
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  88 => 24,  82 => 19,  79 => 18,  75 => 16,  72 => 15,  69 => 14,  64 => 7,  61 => 6,  57 => 2,  54 => 1,  50 => 24,  46 => 22,  44 => 18,  41 => 17,  39 => 14,  32 => 9,  30 => 6,  26 => 4,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main.twig", "C:\\xampp\\htdocs\\diploma\\templates\\main.twig");
    }
}
