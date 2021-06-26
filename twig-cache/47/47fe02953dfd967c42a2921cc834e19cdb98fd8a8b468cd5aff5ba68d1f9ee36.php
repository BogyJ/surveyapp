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
class __TwigTemplate_69b531678ef56cc7883c4d87e20cf05e5704d51a5b8951577e41808f6b38badc extends Template
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
        echo "<form action=\"/user/survey/create/\" method=\"POST\" id=\"survey-form\" enctype=\"multipart/form-data\">
    <fieldset>
        <legend>Kreiranje nove ankete</legend>
        <div id=\"input-elements\">
            <div class=\"form-group\">
                <label for=\"survey-name\">Ime ankete:</label>
                <input type=\"text\" class=\"form-control\" id=\"survey-name\" name=\"survey-name\" required>
            </div>

            <div class=\"form-group\">
                <label for=\"survey-expiry-date\">Vreme i datum isteka ankete:</label>
                <input type=\"date\" class=\"form-control\" id=\"survey-expiry-date\" name=\"expires-at\">
                <small id=\"expiry-date-help\" class=\"form-text text-muted\">Polje može biti prazno.</small>
            </div>

            <div class=\"form-group\">
                <div class=\"input-group\">
                    <div class=\"d-inline-block\">
                        <label for=\"file-upload\" class=\"form-label\">Dozvoljeni fajlovi su: .jpg, .jpeg, .png --MAX 5MB</label>
                        <input type=\"file\" class=\"form-control\" accept=\".jpeg,.jpg,.png\" name=\"file-upload\" id=\"file-upload\">
                    </div>
                </div>
            </div>

            <div class=\"form-group\">
                <label for=\"question-title-1\">Pitanje:</label>
                <input type=\"text\" class=\"form-control\" id=\"question-title-1\" name=\"questionTitle[]\" required>
            </div>

            <div class=\"form-group\">
                <select class=\"custom-select\" name=\"question-type-1\" id=\"question-type-1\">
                    <option value=\"none\">--- Izaberite format odgovora na pitanje ---</option>
                    <option value=\"radio\">Radio</option>
                    <option value=\"checkbox\">Checkbox</option>
                    <option value=\"text\">Text</option>
                </select>
            </div>
        </div>
    </fieldset>
    <button class=\"btn btn-outline-dark\" id=\"add-question-btn\"><i class=\"fas fa-plus\"></i> Dodaj novo pitanje</button>
    <button type=\"submit\" class=\"btn btn-primary ml-2\" id=\"add-survey-btn\"><i class=\"fas fa-save\"></i> Sačuvaj anketu</button>
</form>

<script src=\"/question.js\" type=\"text/javascript\"></script>
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
        return new Source("", "Form/getForm.html", "C:\\xampp\\htdocs\\views\\Form\\getForm.html");
    }
}
