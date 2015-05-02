<?php

/* user/2fa/new_yubikey */
class __TwigTemplate_ad9dcfa2afc01dc050a35ca7b18e4c4310054977206bb793ae06fc7ea38659fd extends TwigBridge\Twig\Template
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
        echo "Adding YubiKey Factor";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "user 2fa add yubikey";
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
        echo "    <h1>New YubiKey Factor</h1>
    ";
        // line 7
        if ((isset($context["invalid_code"]) ? $context["invalid_code"] : null)) {
            // line 8
            echo "        <section class=\"error\">
            The YubiKey could not be validated. Ensure your YubiKey is in Yubico OTP mode, and that the password has
            been uploaded to Yubico's servers. (You can find instructions on doing this using the YubiKey
            Personalization Tool.)
        </section>
    ";
        }
        // line 14
        echo "    <p>YubiKeys are physical devices which emulate a physical keyboard to generate security codes.</p>
    <p>To add a YubiKey:</p>
    <ol>
        <li>Purchase a
            <a href=\"http://www.amazon.com/gp/product/B00LM8U5X6\" target=\"_blank\">YubiKey</a>,
            <a href=\"http://www.amazon.com/gp/product/B00NHSHI8E\" target=\"_blank\">YubiKey Nano</a>,
            <a href=\"http://www.amazon.com/gp/product/B00LX8KZZ8\" target=\"_blank\">YubiKey NEO</a>, or
            <a href=\"http://www.amazon.com/gp/product/B00O8ST7MM\" target=\"_blank\">YubiKey NEO-n</a>.
            (Blue U2F YubiKeys are <strong>not</strong> supported.)
        </li>
        <li>Configure your key in Yubico OTP mode, and upload your key to Yubico's servers. (This is configured by
            default when you purchase a YubiKey, and only necessary if you've reconfigured it since.)</li>
        <li>Select the text box below and touch the button on your YubiKey to generate an OTP.</li>
        <li>Hit \"Add Second Factor\" to confirm the addition of your YubiKey.</li>
    </ol>
    <form method=\"post\">
        ";
        // line 30
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
        <section>
            <input type=\"text\" name=\"code\" id=\"code\" placeholder=\"Code from YubiKey\" required autocomplete=\"off\" value=\"\" />
        </section>
        <input type=\"submit\" value=\"Add Second Factor\" />
    </form>

    <p><a href=\"/user/";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/2fa\">Cancel</a></p>
";
    }

    public function getTemplateName()
    {
        return "user/2fa/new_yubikey";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 37,  91 => 30,  73 => 14,  65 => 8,  63 => 7,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
