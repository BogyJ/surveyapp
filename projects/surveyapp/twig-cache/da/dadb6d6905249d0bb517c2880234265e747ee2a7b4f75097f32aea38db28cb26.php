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
    <form action=\"/projects/surveyapp/user/register/\" method=\"POST\">
        <div class=\"form-group\">
            <label for=\"forename\">Forename</label>
            <input type=\"text\" class=\"form-control\" id=\"forename\" name=\"forename\">
        </div>
        <div class=\"form-group\">
            <label for=\"surname\">Surname</label>
            <input type=\"text\" class=\"form-control\" id=\"surname\" name=\"surname\">
        </div>
        <div class=\"form-group\">
            <label for=\"username\">Username</label>
            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" name=\"email\" aria-describedby=\"emailHelp\">
            <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.</small>
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputPassword1\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" name=\"password1\">
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputPassword2\">Confirm Password</label>
            <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword2\" name=\"password2\">
        </div>
        <button type=\"submit\" class=\"btn btn-primary\">Register</button>
    </form>
</div>
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
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Main/getRegister.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Main\\getRegister.html");
    }
}
