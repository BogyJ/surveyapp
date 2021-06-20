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
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
<!--                    <button type=\"button\" class=\"btn btn-primary\">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>


    <form action=\"/projects/surveyapp/user/login/\" method=\"POST\" class=\"mt-3\">
        <div class=\"form-group\">
            <label for=\"username\">Username</label>
            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\">
        </div>
        <div class=\"form-group\">
            <label for=\"exampleInputPassword1\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" name=\"password\">
        </div>
        <button type=\"submit\" class=\"btn btn-primary\">Login</button>
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
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Main/getLogin.html", "C:\\xampp\\htdocs\\projects\\surveyapp\\views\\Main\\getLogin.html");
    }
}
