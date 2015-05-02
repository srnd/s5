<?php

/* template.twig */
class __TwigTemplate_30fb82266b8ac00f67b8d3bb6ccb33f8ffbe80a603490f2b52a1e9f8c1cdaccc extends TwigBridge\Twig\Template
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
        // line 19
        if ((((isset($context["me"]) ? $context["me"] : null) && $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) && (twig_length_filter($this->env, $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "second_factors", array())) == 0))) {
            // line 20
            echo "    <div class=\"warning\" style=\"position: absolute;top:0;left:0;right:0;padding:1rem;background-color:red;color:white;text-align:center;\">
        Warning: You are an admin, but do not have two-factor authentication configured.
        <a href=\"/user/";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "username", array()), "html", null, true);
            echo "/2fa\">Please add a second factor for login!</a>
    </div>
    <style>body > header { margin-top: 3rem; }</style>
";
        }
        // line 26
        echo "<header>
    <h1><a href=\"";
        // line 27
        if ((isset($context["me"]) ? $context["me"] : null)) {
            echo "/me";
        } else {
            echo "/";
        }
        echo "\">StudentRND <span>s5</span></a></h1>
    <nav>
        <ul>
            ";
        // line 30
        if ((isset($context["me"]) ? $context["me"] : null)) {
            // line 31
            echo "                <li><a href=\"/user/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "username", array()), "html", null, true);
            echo "/edit\">Information</a></li>
                <li><a href=\"/user/";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "username", array()), "html", null, true);
            echo "/password\">Password</a></li>
                <li><a href=\"/apps\">API</a></li>
                ";
            // line 34
            if ($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
                // line 35
                echo "                    <li><a href=\"/admin/\">Admin</a></li>
                ";
            }
            // line 37
            echo "                <li><a href=\"/login/logout\">Logout</a></li>
            ";
        } else {
            // line 39
            echo "                <li><a href=\"/login\">Login</a></li>
            ";
        }
        // line 41
        echo "        </ul>
    </nav>
</header>

";
        // line 45
        $this->displayBlock("before", $context, $blocks);
        echo "
<section class=\"content\">
    ";
        // line 47
        $this->displayBlock("content", $context, $blocks);
        echo "
</section>
";
        // line 49
        $this->displayBlock("after", $context, $blocks);
        echo "

<script type=\"text/javascript\" src=\"/assets/js/util.js\"></script>
";
        // line 52
        $this->displayBlock("scripts", $context, $blocks);
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 52,  130 => 49,  125 => 47,  120 => 45,  114 => 41,  110 => 39,  106 => 37,  102 => 35,  100 => 34,  95 => 32,  90 => 31,  88 => 30,  78 => 27,  75 => 26,  68 => 22,  64 => 20,  62 => 19,  56 => 15,  52 => 14,  46 => 13,  40 => 11,  37 => 10,  35 => 9,  24 => 4,  19 => 1,);
    }
}
