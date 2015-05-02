<?php

/* user/2fa/new_totp */
class __TwigTemplate_71b8e09c1d82fda21f469f98abc48693ad218ab06fd6f390a17cd82fb3fb3786 extends TwigBridge\Twig\Template
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
        echo "Adding Google Authenticator";
    }

    // line 3
    public function block_page($context, array $blocks = array())
    {
        echo "user 2fa add totp";
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
        echo "    <h1>New Google Authenticator Factor</h1>
    ";
        // line 7
        if ((isset($context["invalid_code"]) ? $context["invalid_code"] : null)) {
            // line 8
            echo "        <section class=\"error\">
            The code was invalid.
        </section>
    ";
        }
        // line 12
        echo "    <p>The Google Authenticator app supports generating security codes using your mobile phone.</p>
    <p>To add Google authenticator:</p>
    <ol>
        <li>Install the Google Authenticator app on your
            <a href=\"https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8\" target=\"_blank\">iPhone,</a>
            <a href=\"https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2\" target=\"_blank\">Android</a>,
            or <a href=\"http://www.windowsphone.com/en-us/store/app/authenticator/021dd79f-0598-e011-986b-78e7d1fa76f8\" target=\"_blank\">Windows Phone</a>.
        </li>
        <li>Open the app and touch the \"+\" button.</li>
        <li>
            Tap on \"Scan Barcode\" and scan the following code:
            <div class=\"authenticator-code\" style=\"display: block; text-align: center;\">
                <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["totp"]) ? $context["totp"] : null), "GetQrUri", array()), "html", null, true);
        echo "\" alt=\"QR Code\"/>
            </div>
            <strong>OR</strong> type the following code: <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["totp"]) ? $context["totp"] : null), "getProvisioningUri", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["totp"]) ? $context["totp"] : null), "secret", array()), "html", null, true);
        echo "</a>.
        </li>
        <li>Type the generated code below and hit the \"Add Second Factor\" button to confirm.</li>
    </ol>
    <form method=\"post\">
        ";
        // line 31
        echo (isset($context["csrf"]) ? $context["csrf"] : null);
        echo "
        <input type=\"hidden\" name=\"secret\" id=\"secret\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["totp"]) ? $context["totp"] : null), "getSecret", array()), "html", null, true);
        echo "\"/>
        <section>
            <input type=\"text\" name=\"code\" id=\"code\" placeholder=\"Code from Google Authenticator\" required autocomplete=\"off\" value=\"\" />
        </section>
        <input type=\"submit\" value=\"Add Second Factor\" />
    </form>

    <p><a href=\"/user/";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "/2fa\">Cancel</a></p>
";
    }

    public function getTemplateName()
    {
        return "user/2fa/new_totp";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 39,  104 => 32,  100 => 31,  90 => 26,  85 => 24,  71 => 12,  65 => 8,  63 => 7,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
