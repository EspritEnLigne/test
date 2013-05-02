<?php

/* AcmeDemoBundle::layout.html.twig */
class __TwigTemplate_32058d179b6779e47f290129885ec99b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'sdzblog_body' => array($this, 'block_sdzblog_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "  ESPRIT - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        // line 8
        echo "  
       
  <ul class=\"thumbnails\">
      ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 12
            echo "      <li class=\"span4\">
          <div class=\"thumbnail\" style=\"width: 300px;height: 230px;\">

             <h3>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nom"), "html", null, true);
            echo "</h3>
              <p>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "desc"), "html", null, true);
            echo "
                  <a class=\"btn btn-small btn-primary disabled\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">Lire</a>
                   ";
            // line 18
            if ($this->env->getExtension('security')->isGranted("ROLE_COMMUNICATION")) {
                // line 19
                echo "                  <a class=\"btn btn-small btn-primary disabled\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">Modifier</a>
                   ";
            }
            // line 21
            echo "              </p>
          </div>
      </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 25
        echo "      </ul>
      ";
        // line 26
        if ($this->getAttribute($this->getContext($context, "pagerfanta"), "haveToPaginate")) {
            // line 27
            echo "       ";
            echo $this->env->getExtension('pagerfanta')->renderPagerfanta($this->getContext($context, "pagerfanta"), "twitter_bootstrap_translated");
            echo "
    ";
        }
        // line 28
        echo "   
 
  <hr>
  ";
        // line 33
        echo "  ";
        $this->displayBlock('sdzblog_body', $context, $blocks);
    }

    public function block_sdzblog_body($context, array $blocks = array())
    {
        // line 34
        echo "  ";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 34,  104 => 33,  99 => 28,  93 => 27,  91 => 26,  88 => 25,  79 => 21,  73 => 19,  71 => 18,  67 => 17,  59 => 15,  54 => 12,  50 => 11,  43 => 6,  40 => 5,  33 => 3,  158 => 79,  139 => 63,  135 => 62,  131 => 61,  127 => 60,  123 => 59,  106 => 45,  101 => 43,  97 => 41,  85 => 32,  80 => 30,  76 => 28,  74 => 27,  63 => 16,  58 => 17,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 2,);
    }
}
