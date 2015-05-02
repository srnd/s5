<?php

/* admin/applications */
class __TwigTemplate_4ac7fdd28efeb0d26ac3013fc0e3bd0d5155f746b9895000cb57b8c0fd3970dc extends TwigBridge\Twig\Template
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
        echo "Applications // Admin";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "admin applications";
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
        echo "    <h1>Applications</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>token</th>
                <th>wl:login</th>
                <th>wl:ext</th>
                <th>wl:int</th>
                <th>users</th>
                <th>owners</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["apps"]) ? $context["apps"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["app"]) {
            // line 23
            echo "                <tr>
                    <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "applicationID", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "name", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "token", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            if ($this->getAttribute($context["app"], "whitelist_login", array())) {
                echo "x";
            }
            echo "</td>
                    <td>";
            // line 28
            if ($this->getAttribute($context["app"], "whitelist_extended", array())) {
                echo "x";
            }
            echo "</td>
                    <td>";
            // line 29
            if ($this->getAttribute($context["app"], "allow_internal", array())) {
                echo "x";
            }
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["app"], "users", array())), "html", null, true);
            echo "</td>
                    <td>
                        <ul style=\"margin: 0;\">
                            ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["app"], "admins", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 34
                echo "                                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
                echo "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "                        </ul>
                    </td>
                    <td><a href=\"/apps/";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["app"], "token", array()), "html", null, true);
            echo "\">Edit</a></td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['app'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "admin/applications";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 41,  138 => 38,  134 => 36,  125 => 34,  121 => 33,  115 => 30,  109 => 29,  103 => 28,  97 => 27,  93 => 26,  89 => 25,  85 => 24,  82 => 23,  78 => 22,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
