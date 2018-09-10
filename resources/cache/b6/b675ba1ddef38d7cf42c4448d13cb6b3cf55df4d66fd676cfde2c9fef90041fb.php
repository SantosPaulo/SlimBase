<?php

/* errors/404.twig */
class __TwigTemplate_940149a105b50490eecbe335314b472d838d7e2dec53a2530c917c77d87ae44b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1><strong>404</strong>Page not found...</h1>";
    }

    public function getTemplateName()
    {
        return "errors/404.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "errors/404.twig", "/home/paulo/Desktop/Slim/resources/views/errors/404.twig");
    }
}
