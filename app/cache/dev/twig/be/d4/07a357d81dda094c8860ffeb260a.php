<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_bed407a357d81dda094c8860ffeb260a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        if ($this->getContext($context, "error")) {
            // line 5
            echo "<div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "error"), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
";
        }
        // line 7
        echo "<form  style=\"top: 50%;left: 50%;margin-top: 5px;margin-left: 10px;\"class=\"form-inline\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\">
    <input type=\"text\" class=\"input-small\" id=\"username\" placeholder=\"Username\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" required=\"required\" name=\"_username\">
    <input type=\"password\" class=\"input-small\" id=\"password\" placeholder=\"Password\" required=\"required\" name=\"_password\">
    <label class=\"checkbox\">
    ";
        // line 12
        echo "    </label>
    <button style=\"top: 50%;left: 50%;margin-top: 2px;margin-left: 10px;\" type=\"submit\" class=\"btn\">Sign in</button>
</form>
";
        // line 56
        echo "

";
        // line 86
        echo "       
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  39 => 7,  31 => 4,  28 => 3,  196 => 86,  193 => 85,  191 => 84,  189 => 83,  187 => 82,  184 => 81,  181 => 80,  174 => 73,  171 => 72,  164 => 69,  161 => 68,  155 => 65,  150 => 64,  148 => 63,  145 => 62,  138 => 57,  132 => 54,  124 => 48,  113 => 43,  90 => 36,  86 => 35,  72 => 23,  65 => 19,  61 => 18,  56 => 16,  52 => 14,  47 => 12,  32 => 9,  22 => 2,  19 => 1,  146 => 65,  142 => 64,  137 => 61,  134 => 55,  128 => 56,  125 => 55,  117 => 44,  114 => 6,  108 => 41,  102 => 67,  100 => 60,  95 => 55,  81 => 44,  77 => 43,  55 => 56,  46 => 19,  35 => 10,  29 => 5,  23 => 1,  111 => 34,  104 => 39,  99 => 28,  93 => 27,  91 => 26,  88 => 25,  79 => 21,  73 => 42,  71 => 18,  67 => 17,  59 => 86,  54 => 12,  50 => 12,  43 => 6,  40 => 5,  33 => 5,  158 => 79,  139 => 63,  135 => 62,  131 => 61,  127 => 60,  123 => 59,  106 => 45,  101 => 38,  97 => 59,  85 => 32,  80 => 30,  76 => 28,  74 => 27,  63 => 16,  58 => 17,  48 => 9,  45 => 8,  42 => 7,  36 => 10,  30 => 2,);
    }
}
