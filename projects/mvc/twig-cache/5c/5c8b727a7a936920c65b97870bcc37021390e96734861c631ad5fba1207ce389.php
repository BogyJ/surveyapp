<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* _global/index.html */
class __TwigTemplate_bd8e3ce8a6f5a0d8ebd9fbac3337966cfac5879bfa996842c2352281a01b412e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\"
              content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <title>MVC Demo</title>
    </head>
    <body>
        <header>HEADER</header>

        <main>
            ";
        // line 14
        $this->displayBlock('main', $context, $blocks);
        // line 16
        echo "        </main>

        <footer>FOOTER</footer>
    </body>
</html>";
    }

    // line 14
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "            ";
    }

    public function getTemplateName()
    {
        return "_global/index.html";
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  63 => 14,  55 => 16,  53 => 14,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_global/index.html", "C:\\xampp\\htdocs\\projects\\mvc\\views\\_global\\index.html");
    }
}
