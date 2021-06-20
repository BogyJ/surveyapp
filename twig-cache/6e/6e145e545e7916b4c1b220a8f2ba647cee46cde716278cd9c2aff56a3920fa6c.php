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

/* Form/showFormData.html */
class __TwigTemplate_2ab249a3d685ebe6f3cba3622a068a990d11d50a6bb80791ebd50741ad9ab21c extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Form/showFormData.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1 class=\"display-5 text-center mt-2\">Detalji ankete</h1>
<table class=\"table table-dark mt-5\">
    <thead>
    <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Name</th>
        <th scope=\"col\">User ID</th>
        <th scope=\"col\">Date created</th>
        <th scope=\"col\">Expiry date</th>
        <th scope=\"col\">URL share</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope=\"row\">1</th>
        <td>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["survey"] ?? null), "name", [], "any", false, false, false, 19), "html", null, true);
        echo "</td>
        <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["survey"] ?? null), "user_id", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
        <td>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["survey"] ?? null), "created_at", [], "any", false, false, false, 21), "html", null, true);
        echo "</td>
        <td>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["survey"] ?? null), "expires_at", [], "any", false, false, false, 22), "html", null, true);
        echo "</td>
        <td>
            <input type=\"text\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["BASE"] ?? null), "html", null, true);
        echo "user/survey/share/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["survey"] ?? null), "share_string", [], "any", false, false, false, 24), "html", null, true);
        echo "/\" id=\"copy-text\">
            <button type=\"button\" id=\"copy-btn\"><i class=\"fas fa-copy\"></i></button>
        </td>
    </tr>
    </tbody>
</table>
<p id=\"copy-alert\" class=\"text-center\"></p>

<script src=\"/showFormData.js\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "Form/showFormData.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 24,  79 => 22,  75 => 21,  71 => 20,  67 => 19,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Form/showFormData.html", "C:\\xampp\\htdocs\\views\\Form\\showFormData.html");
    }
}
