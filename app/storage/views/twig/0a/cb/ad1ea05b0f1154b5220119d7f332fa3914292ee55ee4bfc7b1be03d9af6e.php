<?php

/* apps/edit */
class __TwigTemplate_0acbad1ea05b0f1154b5220119d7f332fa3914292ee55ee4bfc7b1be03d9af6e extends TwigBridge\Twig\Template
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
        echo "    <h1>App Information</h1>
    <form action=\"\">
        <p>Token:</p>
        <section>
            <input type=\"text\" readonly value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "token", array()), "html", null, true);
        echo "\" />
        </section>
        <p>Secret:</p>
        <section>
            <input type=\"text\" readonly value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "secret", array()), "html", null, true);
        echo "\" />
        </section>
    </form>

    <h1>Edit ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "name", array()), "html", null, true);
        echo "</h1>
    <form method=\"post\" autocomplete=\"off\">
        <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Name\" required value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "name", array()), "html", null, true);
        echo "\" autocomplete=\"off\" />
        <textarea name=\"description\" id=\"description\" placeholder=\"Description\" required>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "description", array()), "html", null, true);
        echo "</textarea>

        ";
        // line 23
        if ($this->getAttribute((isset($context["me"]) ? $context["me"] : null), "is_admin", array())) {
            // line 24
            echo "            <input type=\"checkbox\" name=\"whitelist_login\" id=\"whitelist_login\" value=\"1\" ";
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "whitelist_login", array())) {
                echo "checked";
            }
            echo " />
            <label for=\"whitelist_login\">Whitelist Login</label>
            <input type=\"checkbox\" name=\"whitelist_extended\" id=\"whitelist_extended\" value=\"1\" ";
            // line 26
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "whitelist_extended", array())) {
                echo "checked";
            }
            echo " />
            <label for=\"whitelist_extended\">Whitelist Extended</label>
            <input type=\"checkbox\" name=\"allow_internal\" id=\"allow_internal\" value=\"1\" ";
            // line 28
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "allow_internal", array())) {
                echo "checked";
            }
            echo " />
            <label for=\"allow_internal\">Allow Internal</label>
        ";
        }
        // line 31
        echo "
        <input type=\"submit\" value=\"Update\" />
    </form>

    ";
        // line 35
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "allow_internal", array())) {
            // line 36
            echo "        <h1>Webhooks</h1>
        <ul>
            ";
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "webhooks", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["webhook"]) {
                // line 39
                echo "                <li>
                    ";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($context["webhook"], "name", array()), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["webhook"], "event", array()), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($context["webhook"], "url", array()), "html", null, true);
                echo ")
                    <form action=\"/apps/";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "token", array()), "html", null, true);
                echo "/deletewebhook/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["webhook"], "id", array()), "html", null, true);
                echo "\" method=\"post\">
                        <input type=\"submit\" value=\"Delete\" />
                    </form>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['webhook'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "        </ul>

        <h2>Create Webhook</h2>
        <form action=\"/apps/";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "token", array()), "html", null, true);
            echo "/addwebhook\" method=\"post\">
            <input type=\"text\" name=\"name\" placeholder=\"Name\" required />
            <select name=\"event\">
                ";
            // line 52
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["webhook_events"]) ? $context["webhook_events"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 53
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $context["event"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["event"], "html", null, true);
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "            </select>
            <input type=\"url\" name=\"url\" placeholder=\"URL\" required />
            <input type=\"submit\" value=\"Create Hook\" />
        </form>
    ";
        }
    }

    public function getTemplateName()
    {
        return "apps/edit";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 55,  174 => 53,  170 => 52,  164 => 49,  159 => 46,  146 => 41,  138 => 40,  135 => 39,  131 => 38,  127 => 36,  125 => 35,  119 => 31,  111 => 28,  104 => 26,  96 => 24,  94 => 23,  89 => 21,  85 => 20,  80 => 18,  73 => 14,  66 => 10,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
