<?php

/* C:\wamp64\www\projetSIO\vendor\cakephp\bake\src\Template\Bake\Layout\default.twig */
class __TwigTemplate_27fdb9c10c57ded9427c1fa180def06a8ae03421b0e30b7d1478c429dc5da0ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_aac3dd4a00b16e9705e6ab14421c3e1c0e715d7f3cfc25567c0549615351b479 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_aac3dd4a00b16e9705e6ab14421c3e1c0e715d7f3cfc25567c0549615351b479->enter($__internal_aac3dd4a00b16e9705e6ab14421c3e1c0e715d7f3cfc25567c0549615351b479_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "C:\\wamp64\\www\\projetSIO\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig"));

        // line 16
        echo $this->getAttribute((isset($context["_view"]) ? $context["_view"] : null), "fetch", array(0 => "content"), "method");
        
        $__internal_aac3dd4a00b16e9705e6ab14421c3e1c0e715d7f3cfc25567c0549615351b479->leave($__internal_aac3dd4a00b16e9705e6ab14421c3e1c0e715d7f3cfc25567c0549615351b479_prof);

    }

    public function getTemplateName()
    {
        return "C:\\wamp64\\www\\projetSIO\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{{ _view.fetch('content')|raw }}", "C:\\wamp64\\www\\projetSIO\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig", "C:\\wamp64\\www\\projetSIO\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig");
    }
}
