<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_1dc2ec8ff48a71f9fcfea849bd60665a7e4a2e57e604cf4f321b2b45c329a333 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_76137056d8eaecb927670bea5a067ea14aa20ae7f78a63a5779b5d7b5d8548f0 = $this->env->getExtension("native_profiler");
        $__internal_76137056d8eaecb927670bea5a067ea14aa20ae7f78a63a5779b5d7b5d8548f0->enter($__internal_76137056d8eaecb927670bea5a067ea14aa20ae7f78a63a5779b5d7b5d8548f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_76137056d8eaecb927670bea5a067ea14aa20ae7f78a63a5779b5d7b5d8548f0->leave($__internal_76137056d8eaecb927670bea5a067ea14aa20ae7f78a63a5779b5d7b5d8548f0_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_566a06ce768dab653f981162a894790a78c0f2ffd64bc042adc750c02d293258 = $this->env->getExtension("native_profiler");
        $__internal_566a06ce768dab653f981162a894790a78c0f2ffd64bc042adc750c02d293258->enter($__internal_566a06ce768dab653f981162a894790a78c0f2ffd64bc042adc750c02d293258_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_566a06ce768dab653f981162a894790a78c0f2ffd64bc042adc750c02d293258->leave($__internal_566a06ce768dab653f981162a894790a78c0f2ffd64bc042adc750c02d293258_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_aabb805f5ddce7ac74f521ae2675ff12ab2890a0b97346ae6d80406556b987cf = $this->env->getExtension("native_profiler");
        $__internal_aabb805f5ddce7ac74f521ae2675ff12ab2890a0b97346ae6d80406556b987cf->enter($__internal_aabb805f5ddce7ac74f521ae2675ff12ab2890a0b97346ae6d80406556b987cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_aabb805f5ddce7ac74f521ae2675ff12ab2890a0b97346ae6d80406556b987cf->leave($__internal_aabb805f5ddce7ac74f521ae2675ff12ab2890a0b97346ae6d80406556b987cf_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ea95c43a54dbc7db48452b476ced8ac4bfdcbd7d13c9b0bd8059e664c8f91784 = $this->env->getExtension("native_profiler");
        $__internal_ea95c43a54dbc7db48452b476ced8ac4bfdcbd7d13c9b0bd8059e664c8f91784->enter($__internal_ea95c43a54dbc7db48452b476ced8ac4bfdcbd7d13c9b0bd8059e664c8f91784_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_ea95c43a54dbc7db48452b476ced8ac4bfdcbd7d13c9b0bd8059e664c8f91784->leave($__internal_ea95c43a54dbc7db48452b476ced8ac4bfdcbd7d13c9b0bd8059e664c8f91784_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
