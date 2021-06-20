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

/* Question/getQuestion.html */
class __TwigTemplate_078f0cc7b6c5dca7373a801f3ee426daee9474b63f2576703880991b924853a3 extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Question/getQuestion.html", 1);
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

<form action=\"/projects/surveyapp/user/survey/question/create/\">
    <div class=\"form-group\">
        <label for=\"question-title\">Pitanje:</label>
        <input type=\"text\" class=\"form-control\" id=\"question-title\">
    </div>

    <div class=\"form-group\">
        <label for=\"question-type\">Izaberite format odgovora na pitanje</label>
        <select class=\"custom-select\" name=\"question-type\" id=\"question-type\">
            <option value=\"radio\">Radio</option>
            <option value=\"checkbox\">Checkbox</option>
            <option value=\"text\">Text</option>
        </select>
    </div>
    <button type=\"submit\" class=\"btn btn-outline-secondary\">Evidentiraj pitanje</button>
</form>

<script src=\"question.js\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "Question/getQuestion.html";
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
        return new Source("", "Question/getQuestion.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Question\\getQuestion.html");
    }
}
