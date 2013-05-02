<?php

namespace EnhancedProxy_79abe7e6aa6a209ef5453c0cc2d6a001f3b1a15c\__CG__\Esprit\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class AbsenceController extends \Esprit\UserBundle\Controller\AbsenceController
{
    private $__CGInterception__loader;

    public function showAction()
    {
        $ref = new \ReflectionMethod('Esprit\\UserBundle\\Controller\\AbsenceController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}