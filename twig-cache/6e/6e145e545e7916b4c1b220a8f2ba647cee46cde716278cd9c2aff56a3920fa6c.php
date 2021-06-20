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

<h1 class=\"mb-5 mt-3\">Responses: ";
        // line 32
        echo twig_escape_filter($this->env, ($context["totalResponses"] ?? null), "html", null, true);
        echo "</h1>

";
        // line 34
        $context["counter"] = 0;
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, twig_length_filter($this->env, ($context["answers"] ?? null))));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 36
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["answers"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["i"]] ?? null) : null))));
            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                // line 37
                echo "        ";
                if ((($context["counter"] ?? null) == 0)) {
                    // line 38
                    echo "            <h3>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["answers"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[$context["i"]] ?? null) : null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[$context["j"]] ?? null) : null), "question", [], "any", false, false, false, 38), "html", null, true);
                    echo "</h3>
            ";
                    // line 39
                    $context["counter"] = (($context["counter"] ?? null) + 1);
                    // line 40
                    echo "        ";
                }
                // line 41
                echo "        <div>
            <p id=\"answer-percentage\">";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["answers"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[$context["i"]] ?? null) : null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[$context["j"]] ?? null) : null), "answer", [], "any", false, false, false, 42), "html", null, true);
                echo "</p>
            ";
                // line 43
                if (twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["answers"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[$context["i"]] ?? null) : null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[$context["j"]] ?? null) : null), "percentage", [], "any", false, false, false, 43)) {
                    // line 44
                    echo "                ";
                    if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["answers"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[$context["i"]] ?? null) : null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[$context["j"]] ?? null) : null), "question_type", [], "any", false, false, false, 44)) == "text")) {
                        // line 45
                        echo "                    <p>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["answers"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[$context["i"]] ?? null) : null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[$context["j"]] ?? null) : null), "answer_value", [], "any", false, false, false, 45), "html", null, true);
                        echo "</p>
                ";
                    } else {
                        // line 47
                        echo "                    <code>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["answers"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f[$context["i"]] ?? null) : null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[$context["j"]] ?? null) : null), "percentage", [], "any", false, false, false, 47), "html", null, true);
                        echo "%</code>
                ";
                    }
                    // line 49
                    echo "            ";
                }
                // line 50
                echo "        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "    ";
            $context["counter"] = 0;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "
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
        return array (  167 => 54,  160 => 52,  153 => 50,  150 => 49,  144 => 47,  138 => 45,  135 => 44,  133 => 43,  129 => 42,  126 => 41,  123 => 40,  121 => 39,  116 => 38,  113 => 37,  108 => 36,  104 => 35,  102 => 34,  97 => 32,  84 => 24,  79 => 22,  75 => 21,  71 => 20,  67 => 19,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Form/showFormData.html", "C:\\xampp\\htdocs\\views\\Form\\showFormData.html");
    }
}
