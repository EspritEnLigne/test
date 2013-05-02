<?php

namespace EnhancedProxy_50225e77f614a1179b506b4183eb562a9e4203e6\__CG__\Esprit\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class EspNoteController extends \Esprit\UserBundle\Controller\EspNoteController
{
    private $__CGInterception__loader;

    public function showAction()
    {
        $ref = new \ReflectionMethod('Esprit\\UserBundle\\Controller\\EspNoteController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}