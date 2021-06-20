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

/* Main/getRegister.html */
class __TwigTemplate_e0ff4c114c14b34ce5586bbe7bc13ef885e2f59a75f6ae0be1b6ffada4acd43c extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Main/getRegister.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"container\">
    <form action=\"/user/register/\" method=\"POST\">
        <div class=\"form-group\">
            <label for=\"forename\">Forename</label>
            <input type=\"text\" class=\"form-control\" id=\"forename\" name=\"forename\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"surname\">Surname</label>
            <input type=\"text\" class=\"form-control\" id=\"surname\" name=\"surname\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"username\">Username</label>
            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" name=\"email\" aria-describedby=\"emailHelp\" required>
            <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.</small>
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputPassword1\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" name=\"password1\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputPassword2\">Confirm Password</label>
            <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword2\" name=\"password2\" required>
        </div>
        <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-sign-in-alt\"></i> Register</button>
    </form>
    ";
        // line 33
        if (($context["message"] ?? null)) {
            // line 34
            echo "        <h1 class=\"display-5 text-center mt-2\">";
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "</h1>
    ";
        }
        // line 36
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "Main/getRegister.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 36,  83 => 34,  81 => 33,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Main/getRegister.html", "C:\\xampp\\htdocs\\views\\Main\\getRegister.html");
    }
}
