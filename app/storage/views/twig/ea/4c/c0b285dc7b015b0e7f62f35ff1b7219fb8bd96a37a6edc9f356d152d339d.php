<?php

/* template-light.twig */
class __TwigTemplate_ea4cc0b285dc7b015b0e7f62f35ff1b7219fb8bd96a37a6edc9f356d152d339d extends TwigBridge\Twig\Template
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
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <title>";
        // line 4
        if ($this->renderBlock("title", $context, $blocks)) {
            $this->displayBlock("title", $context, $blocks);
            echo " // ";
        }
        echo "StudentRND s5</title>
    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\" />
</head>
<body
    ";
        // line 9
        if (($this->renderBlock("page", $context, $blocks) || $this->renderBlock("section", $context, $blocks))) {
            // line 10
            echo "        class=\"";
            if ($this->renderBlock("page", $context, $blocks)) {
                // line 11
                echo "                    ";
                $this->displayBlock("page", $context, $blocks);
                echo "
                ";
            } else {
                // line 13
                echo "                    ";
                $this->displayBlock("section", $context, $blocks);
                echo "
                ";
            }
            // line 14
            echo "\"
    ";
        }
        // line 15
        echo ">
<script type=\"text/javascript\" data-cfasync=\"false\" src=\"//use.typekit.net/mvs6fyv.js\"></script>
<script type=\"text/javascript\" data-cfasync=\"false\">try{Typekit.load();}catch(e){}</script>
<script type=\"text/javascript\" src=\"/assets/js/rainbow-background.js\" data-cfasync=\"false\"></script>

";
        // line 20
        $this->displayBlock("before", $context, $blocks);
        echo "
<section class=\"content\">
    ";
        // line 22
        $this->displayBlock("content", $context, $blocks);
        echo "
</section>
";
        // line 24
        $this->displayBlock("after", $context, $blocks);
        echo "
<script type=\"text/javascript\" src=\"/assets/js/jquery.js\"></script>
<script type=\"text/javascript\" src=\"/assets/js/util.js\"></script>
";
        // line 27
        $this->displayBlock("scripts", $context, $blocks);
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "template-light.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 27,  73 => 24,  68 => 22,  63 => 20,  56 => 15,  52 => 14,  46 => 13,  40 => 11,  37 => 10,  35 => 9,  24 => 4,  19 => 1,);
    }
}
