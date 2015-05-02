<?php

/* apps/index */
class __TwigTemplate_8ce91a6d9e61d4533eb0249948b6f4883199e7e9eb07fd3f0b1b276385f9ace2 extends TwigBridge\Twig\Template
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
        echo "Apps";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "list apps";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "apps";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Apps You Manage</h1>
    <ul>
        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "createdApplications", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["app"]) {
            // line 9
            echo "            <li><a href=\"/apps/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "token", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "name", array()), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['app'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </ul>
    <a class=\"action\" href=\"/apps/new\">Create new</a>
";
    }

    public function getTemplateName()
    {
        return "apps/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 11,  68 => 9,  64 => 8,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
