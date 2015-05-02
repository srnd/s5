<?php

/* apps/new */
class __TwigTemplate_9734a105bad9bd01fc5116a006915614d18157a14ea5b172d200275eae1e8669 extends TwigBridge\Twig\Template
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
        echo "    <h1>New App</h1>
    <form method=\"post\" autocomplete=\"off\">
        <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Name\" required value=\"\" autocomplete=\"off\" />
        <textarea name=\"description\" id=\"description\" placeholder=\"Description\" required></textarea>
        <input type=\"submit\" value=\"Create\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "apps/new";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
