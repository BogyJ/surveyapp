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
        <title>Survey app</title>

        <!-- main.css -->
        <link rel=\"stylesheet\" href=\"/main.css\" type=\"text/css\">

        <!-- fontawesome icons -->
        <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.3/css/all.css\" integrity=\"sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk\" crossorigin=\"anonymous\">

        <!-- bootstrap v4.6 -->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css\" integrity=\"sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l\" crossorigin=\"anonymous\">
    </head>
    <body>
        <header>
            <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse-target\" aria-controls=\"collapse-target\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"collapse-target\">
                    <a href=\"/\" class=\"navbar-brand\">
                        <img src=\"/img/logo.png\" alt=\"Anketa logo\">
                        Anketa App
                    </a>

                    <ul class=\"navbar-nav\">
                        <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Link 1</a></li>
                        <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Link 2</a></li>
                        <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Link 3</a></li>
                        <li class=\"nav-item\"><a href=\"#\" class=\"nav-link\">Link 4</a></li>
                    </ul>
                </div>
            </nav>

<!--            <form class=\"form-inline\" action=\"/projects/surveyapp/user/logout/\" method=\"GET\">-->
<!--                <button class=\"btn btn-outline-success\" type=\"button\">Main button</button>-->
<!--                <button class=\"btn btn-sm btn-outline-secondary\" type=\"button\">Smaller button</button>-->
<!--            </form>-->
        </header>

        <div class=\"container\">
            <main>
                ";
        // line 48
        $this->displayBlock('main', $context, $blocks);
        // line 50
        echo "            </main>
        </div>

        <footer>
            <div class=\"bg-light p-5\">
                <p class=\"text-center align-middle\">Veb aplikacija za kreiranje anketa | Copyright &copy; | All rights reserved</p>
            </div>
        </footer>

        <script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns\" crossorigin=\"anonymous\"></script>
    </body>
</html>";
    }

    // line 48
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "                ";
    }

    public function getTemplateName()
    {
        return "_global/index.html";
    }

    public function getDebugInfo()
    {
        return array (  110 => 49,  106 => 48,  89 => 50,  87 => 48,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_global/index.html", "C:\\xampp\\htdocs\\views\\_global\\index.html");
    }
}
