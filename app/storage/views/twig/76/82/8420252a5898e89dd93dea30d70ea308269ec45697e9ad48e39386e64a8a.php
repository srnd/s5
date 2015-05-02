<?php

/* user/view */
class __TwigTemplate_76828420252a5898e89dd93dea30d70ea308269ec45697e9ad48e39386e64a8a extends TwigBridge\Twig\Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "view user";
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
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
        echo "</h1>
    <ul>
        <li>First name: ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
        echo "</li>
        <li>Last name: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name", array()), "html", null, true);
        echo "</li>
        <li>Email: ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "</li>
        ";
        // line 11
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone", array())) {
            // line 12
            echo "            <li>Phone: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone", array()), "html", null, true);
            echo "</li>
        ";
        }
        // line 14
        echo "    </ul>

    ";
        // line 16
        if ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "userID", array()) == $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "userID", array())) || $this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array()))) {
            // line 17
            echo "        <p><a href=\"/user/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
            echo "/edit\">Edit</a></p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "user/view";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 17,  90 => 16,  86 => 14,  80 => 12,  78 => 11,  74 => 10,  70 => 9,  66 => 8,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
