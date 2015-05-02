<?php

/* login/index */
class __TwigTemplate_d9a309ae6e32d145771f59fc339d5ddd9fcef560936a253628fd0417748eaefe extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("template-light.twig");
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
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template-light.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "login";
    }

    // line 4
    public function block_section($context, array $blocks = array())
    {
        echo "login";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "  <div class=\"wrapper\">
  \t<div class=\"container\">
  \t\t<div class=\"welcome\">
        <h1 class=\"welcome-message\">Welcome to s5</h1>
        <div class=\"user-info\"></div>
      </div>

  \t\t<form class=\"login\" id=\"main-login\">
  \t\t\t<input type=\"text\" placeholder=\"Username\" id=\"username\">
  \t\t\t<input type=\"password\" placeholder=\"Password\" id=\"password\">
  \t\t\t<button type=\"submit\" id=\"login\">Login</button><br><br>
        ";
        // line 17
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
        <a href=\"/invite/cq5l2rEydV3p5g0rGjvitNXT2rzq87Xa\"><small>Need an account?</small></a>
  \t\t</form>

      <form class=\"login\" id=\"second-factor\" style=\"display: none\">
        <div style=\"text-align: center\">Enter the code from Google Authenticator or your YubiKey.</div><br>
        <input type=\"text\" placeholder=\"Second-Factor Code\" id=\"code\">
        ";
        // line 24
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
        <button type=\"submit\" id=\"login-second-factor\">Login</button>
      </form>
  \t</div>

  \t<ul class=\"bg-bubbles\">
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t\t<li></li>
  \t</ul>
  </div>
";
    }

    // line 43
    public function block_scripts($context, array $blocks = array())
    {
        // line 44
        echo "  <script type=\"text/javascript\" src=\"/assets/js/login.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "login/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 44,  107 => 43,  84 => 24,  74 => 17,  61 => 6,  58 => 5,  52 => 4,  46 => 3,  40 => 2,  11 => 1,);
    }
}
