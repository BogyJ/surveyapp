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

/* Main/home.html */
class __TwigTemplate_c6b8c425d425a7783c737427ec242ff58b1827ae6ec6e41203eb86e86552c8ef extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_global/index.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_global/index.html", "Main/home.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"jumbotron mt-5\">
    <h1 class=\"display-4\">Aplikacija za kreiranje anketa</h1>
    <p class=\"lead\">Napravite brzo i lako anketu koju možete da iskorstite za Vaše istraživanje.</p>
    <hr class=\"my-4\">
    <p>Nakon uspešne registracije i logovanja na našem sajtu bićete u mogućnosti da kreirate i delite ankete besplatno!</p>
    <a class=\"btn btn-primary btn-lg\" href=\"/user/login/\" role=\"button\"><i class=\"fas fa-sign-in-alt\"></i> Login</a>
    <a href=\"/user/register/\" class=\"btn btn-outline-dark btn-lg\">Register</a>
</div>
";
    }

    public function getTemplateName()
    {
        return "Main/home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Main/home.html", "C:\\xampp\\htdocs\\views\\Main\\home.html");
    }
}
