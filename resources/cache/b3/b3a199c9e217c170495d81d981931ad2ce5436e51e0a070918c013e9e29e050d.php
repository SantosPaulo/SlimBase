<?php

/* homepage.twig */
class __TwigTemplate_7f43ba4a209c473ebb87597b57bf8001acf7b424d77f554bed83da17eeb535f1 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"pt\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>DMD</title>
        <link href=\"https://fonts.googleapis.com/css?family=Raleway:100,600\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
    </head>
    <body>
        <div class=\"flex-center position-ref full-height\">
            <div class=\"content\">
                <div class=\"title m-b-md\">
                    Wellcome
                </div>
            </div>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "homepage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 9,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "homepage.twig", "/home/paulo/Desktop/SlimBase/resources/views/homepage.twig");
    }
}
