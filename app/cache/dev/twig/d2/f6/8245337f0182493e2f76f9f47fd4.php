<?php

/* @WebProfiler/Profiler/toolbar_js.html.twig */
class __TwigTemplate_d2f68245337f0182493e2f76f9f47fd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("@WebProfiler/Profiler/base_js.html.twig")->display($context);
        // line 3
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        ";
        // line 5
        if (("top" == $this->getContext($context, "position"))) {
            // line 6
            echo "            var sfwdt = document.getElementById('sfwdt";
            echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
            echo "');
            document.body.insertBefore(
                document.body.removeChild(sfwdt),
                document.body.firstChild
            );
        ";
        }
        // line 12
        echo "
        Sfjs.load(
            'sfwdt";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "',
            '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';

                if (el.style.display == 'none') {
                    return;
                }

                if (Sfjs.getPreference('toolbar/displayState') == 'none') {
                    document.getElementById('sfToolbarMainContent-";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfToolbarClearer-";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfMiniToolbar-";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                } else {
                    document.getElementById('sfToolbarMainContent-";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfToolbarClearer-";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfMiniToolbar-";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                }
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "');
                }
            }
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 30,  70 => 26,  62 => 24,  26 => 3,  24 => 2,  133 => 40,  130 => 39,  126 => 37,  118 => 10,  116 => 8,  107 => 6,  98 => 39,  89 => 34,  75 => 28,  66 => 25,  51 => 20,  34 => 7,  44 => 18,  39 => 7,  31 => 4,  28 => 3,  196 => 86,  193 => 85,  191 => 84,  189 => 83,  187 => 82,  184 => 81,  181 => 80,  174 => 73,  171 => 72,  164 => 69,  161 => 68,  155 => 65,  150 => 64,  148 => 63,  145 => 62,  138 => 57,  132 => 54,  124 => 48,  113 => 7,  90 => 36,  86 => 35,  72 => 23,  65 => 19,  61 => 24,  56 => 16,  52 => 14,  47 => 12,  32 => 6,  22 => 2,  19 => 1,  146 => 65,  142 => 64,  137 => 46,  134 => 55,  128 => 56,  125 => 55,  117 => 44,  114 => 6,  108 => 41,  102 => 67,  100 => 47,  95 => 38,  81 => 44,  77 => 43,  55 => 21,  46 => 14,  35 => 10,  29 => 5,  23 => 1,  111 => 34,  104 => 39,  99 => 28,  93 => 36,  91 => 35,  88 => 25,  79 => 29,  73 => 42,  71 => 29,  67 => 17,  59 => 86,  54 => 12,  50 => 15,  43 => 6,  40 => 5,  33 => 5,  158 => 79,  139 => 63,  135 => 42,  131 => 61,  127 => 60,  123 => 36,  106 => 45,  101 => 38,  97 => 59,  85 => 32,  80 => 31,  76 => 28,  74 => 27,  63 => 25,  58 => 17,  48 => 9,  45 => 8,  42 => 12,  36 => 12,  30 => 5,);
    }
}
