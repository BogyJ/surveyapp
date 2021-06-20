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

/* Question/showQuestionForm.html */
class __TwigTemplate_435078625f5a1ac951ebfa0a49dfdcb896d84d04d7e02c9714558cde9a745b6c extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Question/showQuestionForm.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<p>";
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "</p>

<form action=\"/projects/surveyapp/user/survey/question/create/\" id=\"question-form\" method=\"POST\">
    <div id=\"input-elements\">
        <div class=\"form-group\">
            <select class=\"custom-select\" name=\"form-id\" id=\"form-id\">
                <option value=\"none\">--- Izaberite formu na koju se odnosi pitanje ---</option>
                <option value=\"form1\">form1</option>
                <option value=\"form2\">form2</option>
                <option value=\"form3\">form3</option>
            </select>
        </div>

        <div class=\"form-group\">
            <label for=\"question-title\">Pitanje:</label>
            <input type=\"text\" class=\"form-control\" id=\"question-title\" name=\"question-title\" required>
        </div>

        <div class=\"form-group\">
            <select class=\"custom-select\" name=\"question-type\" id=\"question-type\">
                <option value=\"none\">--- Izaberite format odgovora na pitanje ---</option>
                <option value=\"radio\">Radio</option>
                <option value=\"checkbox\">Checkbox</option>
                <option value=\"text\">Text</option>
            </select>
        </div>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\" id=\"add-question-btn\">Evidentiraj pitanje</button>
</form>

<script src=\"/projects/surveyapp/views/Question/question.js\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "Question/showQuestionForm.html";
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
        return new Source("", "Question/showQuestionForm.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Question\\showQuestionForm.html");
    }
}
