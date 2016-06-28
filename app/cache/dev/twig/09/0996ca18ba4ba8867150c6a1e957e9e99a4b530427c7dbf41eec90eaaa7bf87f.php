<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_acaa511073f93e4b5e5131c47353fdce4a7249eb2b4b29f5c4dddaf0d56d9194 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_94a7cbc0c289edafe7da5d1c3687c700a4e0c4ac58502671cd6354e21b6cd9cb = $this->env->getExtension("native_profiler");
        $__internal_94a7cbc0c289edafe7da5d1c3687c700a4e0c4ac58502671cd6354e21b6cd9cb->enter($__internal_94a7cbc0c289edafe7da5d1c3687c700a4e0c4ac58502671cd6354e21b6cd9cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_94a7cbc0c289edafe7da5d1c3687c700a4e0c4ac58502671cd6354e21b6cd9cb->leave($__internal_94a7cbc0c289edafe7da5d1c3687c700a4e0c4ac58502671cd6354e21b6cd9cb_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_5763199c343c30721fafa65a5a7545bb1f041781e7250af5193ed37a3e27f8b9 = $this->env->getExtension("native_profiler");
        $__internal_5763199c343c30721fafa65a5a7545bb1f041781e7250af5193ed37a3e27f8b9->enter($__internal_5763199c343c30721fafa65a5a7545bb1f041781e7250af5193ed37a3e27f8b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_5763199c343c30721fafa65a5a7545bb1f041781e7250af5193ed37a3e27f8b9->leave($__internal_5763199c343c30721fafa65a5a7545bb1f041781e7250af5193ed37a3e27f8b9_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_07f027e5fc00ac9507fab220b1ff905c6cbf57b80f168f103e6325ff4161b5b5 = $this->env->getExtension("native_profiler");
        $__internal_07f027e5fc00ac9507fab220b1ff905c6cbf57b80f168f103e6325ff4161b5b5->enter($__internal_07f027e5fc00ac9507fab220b1ff905c6cbf57b80f168f103e6325ff4161b5b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_07f027e5fc00ac9507fab220b1ff905c6cbf57b80f168f103e6325ff4161b5b5->leave($__internal_07f027e5fc00ac9507fab220b1ff905c6cbf57b80f168f103e6325ff4161b5b5_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_5b8138d1057f6921f55751193b84731ecb8a39c96d1d34f65a097f8b06fd64af = $this->env->getExtension("native_profiler");
        $__internal_5b8138d1057f6921f55751193b84731ecb8a39c96d1d34f65a097f8b06fd64af->enter($__internal_5b8138d1057f6921f55751193b84731ecb8a39c96d1d34f65a097f8b06fd64af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_5b8138d1057f6921f55751193b84731ecb8a39c96d1d34f65a097f8b06fd64af->leave($__internal_5b8138d1057f6921f55751193b84731ecb8a39c96d1d34f65a097f8b06fd64af_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
