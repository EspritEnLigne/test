<?php

namespace Esprit\UserBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class EspNoteController__JMSInjector
{
    public static function inject($container) {
        require_once 'C:/wamp/www/enligne/app/cache/dev/jms_diextra/proxies/Esprit-UserBundle-Controller-EspNoteController.php';
        $b = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('Esprit\\UserBundle\\Controller\\EspNoteController' => array('showAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_50225e77f614a1179b506b4183eb562a9e4203e6\__CG__\Esprit\UserBundle\Controller\EspNoteController();
        $instance->__CGInterception__setLoader($b);
        return $instance;
    }
}
