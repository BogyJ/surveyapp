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

/* Main/getLogin.html */
class __TwigTemplate_efb4549cc8008da2e085404bddf1d4cc6ab958bcc846f879987b5594e0b1c173 extends Template
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
        $this->parent = $this->loadTemplate("_global/index.html", "Main/getLogin.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"container\">

    <!-- Button trigger modal -->
    <button type=\"button\" class=\"btn btn-outline-dark mt-5\" data-toggle=\"modal\" data-target=\"#exampleModal\">
        Pogledaj predefinisano korisničko ime i lozinku
    </button>

    <!-- Modal -->
    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Parametri za logovanje</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <h4>Korisničko ime: <span class=\"badge badge-info\">admin</span></h4>
                    <h4>Lozinka: <span class=\"badge badge-info\">admin</span></h4>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Zatvori</button>
                </div>
            </div>
        </div>
    </div>

    <form action=\"/user/login/\" method=\"POST\" class=\"mt-3\">
        <div class=\"form-group\">
            <label for=\"username\">Username</label>
            ";
        // line 35
        if (($context["credentials"] ?? null)) {
            // line 36
            echo "                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["credentials"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null));
            echo "\">
            ";
        } else {
            // line 38
            echo "                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">
            ";
        }
        // line 40
        echo "        </div>
        <div class=\"form-group\">
            <label for=\"password\">Password</label>
            ";
        // line 43
        if (($context["credentials"] ?? null)) {
            // line 44
            echo "                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["credentials"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[1] ?? null) : null));
            echo "\">
            ";
        } else {
            // line 46
            echo "                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">
            ";
        }
        // line 48
        echo "
        </div>
        <div class=\"form-group form-check\">
            <input type=\"checkbox\" class=\"form-check-input\" id=\"remember-me\" name=\"remember\">
            <label class=\"form-check-label\" for=\"remember-me\">Zapamti me na ovom uređaju (saglasan sam sa uslovima korišćenja kolačića)</label>
        </div>
        <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-sign-in-alt\"></i> Login</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "Main/getLogin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 48,  108 => 46,  102 => 44,  100 => 43,  95 => 40,  91 => 38,  85 => 36,  83 => 35,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Main/getLogin.html", "C:\\xampp\\htdocs\\views\\Main\\getLogin.html");
    }
}
