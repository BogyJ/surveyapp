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

/* UserCategoryManagement/getAdd.html */
class __TwigTemplate_5bea50cc07729b45440c26b8bccbd46db319ac20154c4f6d6fd8d5f47c30390a extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "UserCategoryManagement/getAdd.html", 1);
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
    </div>

    <form class=\"category-form\" method=\"POST\">
        <div>
            <label for=\"category-name\">Name:</label>
            <input type=\"text\" id=\"category-name\" name=\"name\" required>            
        </div>

        <div>
            <button type=\"submit\">
                Add category
            </button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "UserCategoryManagement/getAdd.html";
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
        return new Source("", "UserCategoryManagement/getAdd.html", "C:\\xampp\\htdocs\\views\\UserCategoryManagement\\getAdd.html");
    }
}
