<?php

/* errors/500.twig */
class __TwigTemplate_b3b2da8dbb933d4cdb38bac7004769c28ecb7dcb93955d2f760360e54967d72b extends Twig_Template
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
        echo "<h1><strong>500</strong></h1>
<h2>Something went wrong...</h2>";
    }

    public function getTemplateName()
    {
        return "errors/500.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "errors/500.twig", "/home/paulo/Desktop/Slim/resources/views/errors/500.twig");
    }
}
