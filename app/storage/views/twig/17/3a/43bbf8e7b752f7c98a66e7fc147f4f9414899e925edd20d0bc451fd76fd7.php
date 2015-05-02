<?php

/* admin/invites/index */
class __TwigTemplate_173a43bbf8e7b752f7c98a66e7fc147f4f9414899e925edd20d0bc451fd76fd7 extends TwigBridge\Twig\Template
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
        echo "Invites // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin invites";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "admin";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Invites</h1>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["invites"]) ? $context["invites"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["invite"]) {
            // line 8
            echo "        <li><a href=\"/admin/invites/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["invite"], "id", array()), "html", null, true);
            echo "/edit\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["invite"], "code", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($context["invite"], "only_for_description", array()), "html", null, true);
            echo ")</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['invite'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "
    <a class=\"action\" href=\"/admin/invites/new\">Create new</a>
";
    }

    public function getTemplateName()
    {
        return "admin/invites/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 10,  67 => 8,  63 => 7,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
