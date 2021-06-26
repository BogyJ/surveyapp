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

/* User/index.html */
class __TwigTemplate_3a0f9444a2d04d38ae949124c32deec36f43b7a61271e060baba88a1679f7fad extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "User/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"jumbotron mt-5\">
    ";
        // line 5
        if (($context["user"] ?? null)) {
            // line 6
            echo "    <h1 class=\"display-4\">Dobro došli, ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "forename", [], "any", false, false, false, 6));
            echo "</h1>
    ";
        } else {
            // line 8
            echo "    <h1 class=\"display-4\">Aplikacija za kreiranje anketa</h1>
    ";
        }
        // line 10
        echo "    <a href=\"/user/survey/show/\">Napravi anketu</a><br>
    <a href=\"/user/survey/show/all/\">Pogledaj spisak mojih anketa</a>
</div>
<a href=\"/user/logout/\"><i class=\"fas fa-sign-out-alt\"></i> Logout</a>
";
    }

    public function getTemplateName()
    {
        return "User/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 10,  61 => 8,  55 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "User/index.html", "C:\\xampp\\htdocs\\views\\User\\index.html");
    }
}
