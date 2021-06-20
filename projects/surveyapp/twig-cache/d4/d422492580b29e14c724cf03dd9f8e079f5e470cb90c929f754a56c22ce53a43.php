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

/* Form/getForm.html */
class __TwigTemplate_252f73631a0b444db3d4bb82e07e2b512fbb7bce09858007b1c33740c98523f7 extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Form/getForm.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!--<select class=\"custom-select\">-->
<!--    <option selected>Izaberite tip pitanja</option>-->
<!--    <option value=\"radio\">Radio</option>-->
<!--    <option value=\"checkbox\">Checkbox</option>-->
<!--    <option value=\"text\">Text</option>-->
<!--</select>-->

<form action=\"/projects/surveyapp/user/survey/create/\">
    <div class=\"form-group\">
        <label for=\"survey-name\">Ime ankete:</label>
        <input type=\"text\" class=\"form-control\" id=\"survey-name\">
    </div>

    <div class=\"form-group\">
        <label for=\"survey-expiry-date\">Vreme i datum isteka ankete:</label>
        <input type=\"datetime-local\" class=\"form-control\" id=\"survey-expiry-date\">
        <small id=\"expiry-date-help\" class=\"form-text text-muted\">Ne mora biti definisano vreme.</small>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Napravi anketu</button>
</form>
";
    }

    public function getTemplateName()
    {
        return "Form/getForm.html";
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
        return new Source("", "Form/getForm.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Form\\getForm.html");
    }
}
