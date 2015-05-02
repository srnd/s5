<?php

/* user/password */
class __TwigTemplate_f32dd5ace3d92c5fdd6eb91c6dcd65f0c534ddade6994dbe7ed43ecacdf2e293 extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("template.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'page' => array($this, 'block_page'),
            'section' => array($this, 'block_section'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Changing Password";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "password user";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "user";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>
        Change
        ";
        // line 8
        if (($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "userID", array()) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "userID", array()))) {
            // line 9
            echo "            your
        ";
        } else {
            // line 11
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
            echo "'s
        ";
        }
        // line 13
        echo "        password
    </h1>
    ";
        // line 15
        if (((isset($context["error"]) ? $context["error"] : null) == "oldpassword")) {
            // line 16
            echo "        <section class=\"error\">
            Old password was incorrect.
        </section>
    ";
        } elseif ((        // line 19
(isset($context["error"]) ? $context["error"] : null) == "mismatch")) {
            // line 20
            echo "        <section class=\"error\">
            Passwords did not match.
        </section>
    ";
        }
        // line 24
        echo "    <form method=\"post\">
        <section>
            ";
        // line 26
        if (($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "userID", array()) == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "userID", array()))) {
            // line 27
            echo "                <input type=\"password\" name=\"old_password\" id=\"password\" placeholder=\"Old Password\" required autocomplete=\"off\" value=\"\" />
            ";
        }
        // line 29
        echo "            <input type=\"password\" name=\"new_password\" id=\"new_password\" placeholder=\"New Password\" required autocomplete=\"off\" value=\"\" />
            <input type=\"password\" name=\"new_password_confirm\" id=\"new_password_confirm\" placeholder=\"New Password\" required autocomplete=\"off\" value=\"\" />
        </section>
        <input type=\"submit\" value=\"Change Password\" />
    </form>

    <p><a href=\"/user/";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/edit\">Cancel</a></p>
";
    }

    public function getTemplateName()
    {
        return "user/password";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 35,  105 => 29,  101 => 27,  99 => 26,  95 => 24,  89 => 20,  87 => 19,  82 => 16,  80 => 15,  76 => 13,  70 => 11,  66 => 9,  64 => 8,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
