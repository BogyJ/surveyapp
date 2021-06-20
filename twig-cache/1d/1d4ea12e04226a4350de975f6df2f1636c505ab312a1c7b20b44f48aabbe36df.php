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

/* Form/showForms.html */
class __TwigTemplate_6f087e737aae2814f0df89c241a383583d025f1f1f13fc4c2d37b10709a67110 extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Form/showForms.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1 class=\"display-4 text-center mt-3\">Moje ankete</h1>
<ul class=\"text-center mt-5\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["surveys"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["survey"]) {
            // line 7
            echo "        <a href=\"/user/survey/show/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["survey"], "form_id", [], "any", false, false, false, 7), "html", null, true);
            echo "/\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["survey"], "name", [], "any", false, false, false, 7));
            echo "</a><br>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['survey'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "Form/showForms.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 9,  58 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Form/showForms.html", "C:\\xampp\\htdocs\\views\\Form\\showForms.html");
    }
}
