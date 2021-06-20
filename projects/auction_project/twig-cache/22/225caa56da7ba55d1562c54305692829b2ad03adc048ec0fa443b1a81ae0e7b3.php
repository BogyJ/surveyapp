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

/* UserCategoryManagement/getEdit.html */
class __TwigTemplate_8359bb65ec03acbe39a46f1e8c061d6c4743a4dac58c0f4a6165022f01c76ca0 extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "UserCategoryManagement/getEdit.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div>
    <div class=\"options\">
        <a href=\"/user/categories/\">List all categories</a>
        <a href=\"/user/categories/add/\">Add new category</a>
    </div>

    <form class=\"category-form\" method=\"POST\">
        <div>
            <label for=\"category-name\">Name:</label>
            <input type=\"text\" id=\"category-name\" name=\"name\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 13));
        echo "\">            
        </div>

        <div>
            <button type=\"submit\">
                Edit category
            </button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "UserCategoryManagement/getEdit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 13,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "UserCategoryManagement/getEdit.html", "C:\\xampp\\htdocs\\views\\UserCategoryManagement\\getEdit.html");
    }
}
