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

/* Question/displayQuestion.html */
class __TwigTemplate_3222cff3d1afce67efb23344de084d21f0842298682a26b8fcede44f8fc8b75a extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Question/displayQuestion.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h3>Question ID: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "question_id", [], "any", false, false, false, 4));
        echo "</h3>
<ul>
    <li>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["question"] ?? null), "name", [], "any", false, false, false, 6));
        echo "</li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "Question/displayQuestion.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Question/displayQuestion.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Question\\displayQuestion.html");
    }
}
