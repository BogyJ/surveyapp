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
class __TwigTemplate_6cb47e673e531a45664528dc45347220af109990fe4d6b432c019da25ab1c1b5 extends Template
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
        echo "<form action=\"/user/register/\" method=\"POST\">
    <div>
        <label for=\"input-email\">E-mail:</label>
        <input type=\"email\" id=\"input-email\" name=\"reg-email\" required placeholder=\"someone@mail.com\">
    </div>

    <div>
        <label for=\"input-forename\">Forename:</label>
        <input type=\"text\" id=\"input-forename\" name=\"reg-forename\" required placeholder=\"Bogdan\">
    </div>

    <div>
        <label for=\"input-surname\">Surname:</label>
        <input type=\"text\" id=\"input-surname\" name=\"reg-surname\" required placeholder=\"Jovanović\">
    </div>

    <div>
        <label for=\"input-username\">Username:</label>
        <input type=\"text\" id=\"input-username\" name=\"reg-username\" required placeholder=\"bogdan_jovanovic\">
    </div>

    <div>
        <label for=\"input-password-1\">Password:</label>
        <input type=\"password\" id=\"input-password-1\" name=\"reg-password-1\" required>
    </div>

    <div>
        <label for=\"input-password-2\">Confirm password:</label>
        <input type=\"password\" id=\"input-password-2\" name=\"reg-password-2\" required>
    </div>

    <div>
        <input type=\"submit\" value=\"Register\">
    </div>
</form>
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
        return new Source("", "Main/getRegister.html", "C:\\xampp\\htdocs\\views\\Main\\getRegister.html");
    }
}
