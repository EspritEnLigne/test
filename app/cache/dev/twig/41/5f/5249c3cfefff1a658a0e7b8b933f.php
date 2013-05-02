<?php

/* ::layout.html.twig */
class __TwigTemplate_415f5249c3cfefff1a658a0e7b8b933f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title> ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "  </head>
  <body>
       <div class=\"container\">
      <div class=\"navbar navbar-fixed-top\">
          <div class=\"navbar\">
              <div class=\"navbar-inner\">
                 


                  <a class=\"brand\" href=\"#\"><img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.png"), "html", null, true);
        echo "\"></a>
                     ";
        // line 21
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcmeDemoBundle:Demo:menu", array("max" => 3)));
        echo "

                     ";
        // line 27
        echo "                  </div>

              </div>
          </div>
               
      </div>
      <div id=\"header\" class=\"hero-unit\">
            <div id=\"myCarousel\" class=\"carousel slide\">
                   <ol class=\"carousel-indicators\">
                       <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
                       <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
                       <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
                   </ol>
                   <!-- Carousel items -->
                   <div class=\"carousel-inner\">
                       
                       <div class=\"active item\"><center><img src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/eesprit.jpg"), "html", null, true);
        echo "\" /></center></div>
                       <div class=\"item\"><center><img src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/esprit.bmp"), "html", null, true);
        echo "\" /></center></div>
                       <div class=\"item\"><center><img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/espritprepa.bmp"), "html", null, true);
        echo "\" /></center></div>
                   </div>
                   <!-- Carousel nav -->
                  
                   <a class=\"carousel-control left\" href=\"myCarousel\" data-slide=\"prev\">&lsaquo;</a>
                   <a class=\"carousel-control right\" href=\"myCarousel\" data-slide=\"next\">&rsaquo;</a>
               </div>
          
      
      </div>
          <div style=\"margin-left: 10%;margin-right: 10%;\">
          ";
        // line 56
        $this->displayBlock('body', $context, $blocks);
        // line 60
        echo "      </div>
          
          <div id=\"footer\" style=\" height: 50px;\">
              ";
        // line 63
        $this->displayBlock('footer', $context, $blocks);
        // line 75
        echo "          </div>
  ";
        // line 76
        $this->displayBlock('javascripts', $context, $blocks);
        // line 83
        echo "  </body>

</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "ESPRIT";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "      <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
      <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/footer.css"), "html", null, true);
        echo "\" type=\"text/css\" />
   
    ";
    }

    // line 56
    public function block_body($context, array $blocks = array())
    {
        // line 57
        echo "        
      
          ";
    }

    // line 63
    public function block_footer($context, array $blocks = array())
    {
        // line 64
        echo "                  <ul id=\"navfooter\">
                      <li><a>Accueil</a></li>
                      <li><a>Inscription</a></li>
                      <li><a>Scolarite</a></li>
                      <li><a>Plateforme E-learning</a></li>
                      <li><a>Stages et Projets</a></li>
                      <li><a>Réglement intérieur</a></li>
                      <li><a>Contact</a></li>
                  </ul>
                  <a>benahmed_houcine@yahoo.fr</a>
                  ";
    }

    // line 76
    public function block_javascripts($context, array $blocks = array())
    {
        // line 77
        echo "    ";
        // line 79
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/shadowbox.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 81,  171 => 80,  168 => 79,  166 => 77,  163 => 76,  149 => 64,  146 => 63,  140 => 57,  137 => 56,  130 => 8,  125 => 7,  122 => 6,  116 => 5,  110 => 83,  108 => 76,  105 => 75,  103 => 63,  98 => 60,  96 => 56,  82 => 45,  78 => 44,  74 => 43,  56 => 27,  51 => 21,  47 => 20,  36 => 11,  34 => 6,  30 => 5,  24 => 1,);
    }
}
