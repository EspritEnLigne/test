<?php

namespace Esprit\UserBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class NewsController__JMSInjector
{
    public static function inject($container) {
        require_once 'C:/wamp/www/enligne/app/cache/dev/jms_diextra/proxies/Esprit-UserBundle-Controller-NewsController.php';
        $c = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Esprit\\UserBundle\\Controller\\NewsController' => array('newAction' => array(0 => 'security.access.method_interceptor'), 'editAction' => array(0 => 'security.access.method_interceptor'), 'updateAction' => array(0 => 'security.access.method_interceptor'), 'deleteAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_6455d649838166b4cf8709617b5767ee71bd916a\__CG__\Esprit\UserBundle\Controller\NewsController();
        $instance->__CGInterception__setLoader($c);
        return $instance;
    }
}