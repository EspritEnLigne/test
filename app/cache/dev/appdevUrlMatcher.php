<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // esprit_seminaire_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'esprit_seminaire_homepage')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/inscritsemin')) {
            // inscritsemin
            if (rtrim($pathinfo, '/') === '/inscritsemin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'inscritsemin');
                }

                return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::indexAction',  '_route' => 'inscritsemin',);
            }

            // inscritsemin_show
            if (preg_match('#^/inscritsemin/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inscritsemin_show')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::showAction',));
            }

            // inscritsemin_new
            if ($pathinfo === '/inscritsemin/new') {
                return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::newAction',  '_route' => 'inscritsemin_new',);
            }

            // inscritsemin_create
            if ($pathinfo === '/inscritsemin/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_inscritsemin_create;
                }

                return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::createAction',  '_route' => 'inscritsemin_create',);
            }
            not_inscritsemin_create:

            // inscritsemin_edit
            if (preg_match('#^/inscritsemin/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inscritsemin_edit')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::editAction',));
            }

            // inscritsemin_update
            if (preg_match('#^/inscritsemin/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_inscritsemin_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inscritsemin_update')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::updateAction',));
            }
            not_inscritsemin_update:

            // inscritsemin_delete
            if (preg_match('#^/inscritsemin/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_inscritsemin_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inscritsemin_delete')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\InscritSeminController::deleteAction',));
            }
            not_inscritsemin_delete:

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/seminaire')) {
                // seminaire
                if (rtrim($pathinfo, '/') === '/seminaire') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'seminaire');
                    }

                    return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::indexAction',  '_route' => 'seminaire',);
                }

                // seminaire_show
                if (preg_match('#^/seminaire/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seminaire_show')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::showAction',));
                }

                // seminaire_new
                if ($pathinfo === '/seminaire/new') {
                    return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::newAction',  '_route' => 'seminaire_new',);
                }

                // seminaire_create
                if ($pathinfo === '/seminaire/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_seminaire_create;
                    }

                    return array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::createAction',  '_route' => 'seminaire_create',);
                }
                not_seminaire_create:

                // seminaire_edit
                if (preg_match('#^/seminaire/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seminaire_edit')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::editAction',));
                }

                // seminaire_update
                if (preg_match('#^/seminaire/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_seminaire_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seminaire_update')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::updateAction',));
                }
                not_seminaire_update:

                // seminaire_delete
                if (preg_match('#^/seminaire/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_seminaire_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seminaire_delete')), array (  '_controller' => 'Esprit\\SeminaireBundle\\Controller\\SeminaireController::deleteAction',));
                }
                not_seminaire_delete:

            }

            if (0 === strpos($pathinfo, '/scolarite')) {
                // esprit_rubrique_homepage
                if (rtrim($pathinfo, '/') === '/scolarite') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'esprit_rubrique_homepage');
                    }

                    return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::indexAction',  '_route' => 'esprit_rubrique_homepage',);
                }

                if (0 === strpos($pathinfo, '/scolarite/rubrique')) {
                    // rubrique
                    if (rtrim($pathinfo, '/') === '/scolarite/rubrique') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'rubrique');
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::indexAction',  '_route' => 'rubrique',);
                    }

                    // rubrique_show
                    if (preg_match('#^/scolarite/rubrique/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubrique_show')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::showAction',));
                    }

                    // rubrique_showMenu
                    if (preg_match('#^/scolarite/rubrique/(?P<id>[^/]++)/showMenu$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubrique_showMenu')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::showMenuAction',));
                    }

                    // rubrique_new
                    if ($pathinfo === '/scolarite/rubrique/new') {
                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::newAction',  '_route' => 'rubrique_new',);
                    }

                    // rubrique_create
                    if ($pathinfo === '/scolarite/rubrique/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_rubrique_create;
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::createAction',  '_route' => 'rubrique_create',);
                    }
                    not_rubrique_create:

                    // rubrique_edit
                    if (preg_match('#^/scolarite/rubrique/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubrique_edit')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::editAction',));
                    }

                    // rubrique_update
                    if (preg_match('#^/scolarite/rubrique/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_rubrique_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubrique_update')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::updateAction',));
                    }
                    not_rubrique_update:

                    // rubrique_delete
                    if (preg_match('#^/scolarite/rubrique/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_rubrique_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubrique_delete')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueController::deleteAction',));
                    }
                    not_rubrique_delete:

                }

                if (0 === strpos($pathinfo, '/scolarite/document')) {
                    // document
                    if (rtrim($pathinfo, '/') === '/scolarite/document') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'document');
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::indexAction',  '_route' => 'document',);
                    }

                    // document_show
                    if (preg_match('#^/scolarite/document/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_show')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::showAction',));
                    }

                    // document_new
                    if ($pathinfo === '/scolarite/document/new') {
                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::newAction',  '_route' => 'document_new',);
                    }

                    // document_create
                    if ($pathinfo === '/scolarite/document/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_document_create;
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::createAction',  '_route' => 'document_create',);
                    }
                    not_document_create:

                    // document_edit
                    if (preg_match('#^/scolarite/document/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_edit')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::editAction',));
                    }

                    // document_update
                    if (preg_match('#^/scolarite/document/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_document_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_update')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::updateAction',));
                    }
                    not_document_update:

                    // document_delete
                    if (preg_match('#^/scolarite/document/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_delete')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::deleteAction',));
                    }

                    // document_download
                    if (preg_match('#^/scolarite/document/(?P<path>[^/]++)/download$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_download')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::fileAction',));
                    }

                    // document_read
                    if (preg_match('#^/scolarite/document/(?P<path>[^/]++)/read$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'document_read')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentController::readfileAction',));
                    }

                    if (0 === strpos($pathinfo, '/scolarite/documentstage')) {
                        // documentstage
                        if (rtrim($pathinfo, '/') === '/scolarite/documentstage') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'documentstage');
                            }

                            return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::indexAction',  '_route' => 'documentstage',);
                        }

                        // documentstage_show
                        if (preg_match('#^/scolarite/documentstage/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentstage_show')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::showAction',));
                        }

                        // documentstage_new
                        if ($pathinfo === '/scolarite/documentstage/new') {
                            return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::newAction',  '_route' => 'documentstage_new',);
                        }

                        // documentstage_create
                        if ($pathinfo === '/scolarite/documentstage/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_documentstage_create;
                            }

                            return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::createAction',  '_route' => 'documentstage_create',);
                        }
                        not_documentstage_create:

                        // documentstage_edit
                        if (preg_match('#^/scolarite/documentstage/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentstage_edit')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::editAction',));
                        }

                        // documentstage_update
                        if (preg_match('#^/scolarite/documentstage/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_documentstage_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentstage_update')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::updateAction',));
                        }
                        not_documentstage_update:

                        // documentstage_delete
                        if (preg_match('#^/scolarite/documentstage/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentstage_delete')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::deleteAction',));
                        }

                        // documentstage_download
                        if (preg_match('#^/scolarite/documentstage/(?P<path>[^/]++)/download$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentstage_download')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\DocumentStageController::fileAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/scolarite/rubriquestage')) {
                    // rubriquestage
                    if (rtrim($pathinfo, '/') === '/scolarite/rubriquestage') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'rubriquestage');
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::indexAction',  '_route' => 'rubriquestage',);
                    }

                    // rubriquestage_show
                    if (preg_match('#^/scolarite/rubriquestage/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubriquestage_show')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::showAction',));
                    }

                    // rubriquestage_showMenuStage
                    if (preg_match('#^/scolarite/rubriquestage/(?P<id>[^/]++)/showMenuStage$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubriquestage_showMenuStage')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::showMenuStageAction',));
                    }

                    // rubriquestage_new
                    if ($pathinfo === '/scolarite/rubriquestage/new') {
                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::newAction',  '_route' => 'rubriquestage_new',);
                    }

                    // rubriquestage_create
                    if ($pathinfo === '/scolarite/rubriquestage/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_rubriquestage_create;
                        }

                        return array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::createAction',  '_route' => 'rubriquestage_create',);
                    }
                    not_rubriquestage_create:

                    // rubriquestage_edit
                    if (preg_match('#^/scolarite/rubriquestage/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubriquestage_edit')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::editAction',));
                    }

                    // rubriquestage_update
                    if (preg_match('#^/scolarite/rubriquestage/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_rubriquestage_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubriquestage_update')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::updateAction',));
                    }
                    not_rubriquestage_update:

                    // rubriquestage_delete
                    if (preg_match('#^/scolarite/rubriquestage/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_rubriquestage_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'rubriquestage_delete')), array (  '_controller' => 'Esprit\\RubriqueBundle\\Controller\\RubriqueStageController::deleteAction',));
                    }
                    not_rubriquestage_delete:

                }

            }

        }

        if (0 === strpos($pathinfo, '/espe')) {
            if (0 === strpos($pathinfo, '/espenseigant')) {
                // espenseignant
                if (rtrim($pathinfo, '/') === '/espenseigant') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'espenseignant');
                    }

                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::indexAction',  '_route' => 'espenseignant',);
                }

                // espenseignant_show
                if (preg_match('#^/espenseigant/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espenseignant_show')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::showAction',));
                }

                // espenseignant_new
                if ($pathinfo === '/espenseigant/new') {
                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::newAction',  '_route' => 'espenseignant_new',);
                }

                // espenseignant_create
                if ($pathinfo === '/espenseigant/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_espenseignant_create;
                    }

                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::createAction',  '_route' => 'espenseignant_create',);
                }
                not_espenseignant_create:

                // espenseignant_edit
                if (preg_match('#^/espenseigant/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espenseignant_edit')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::editAction',));
                }

                // espenseignant_update
                if (preg_match('#^/espenseigant/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_espenseignant_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espenseignant_update')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::updateAction',));
                }
                not_espenseignant_update:

                // espenseignant_delete
                if (preg_match('#^/espenseigant/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_espenseignant_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espenseignant_delete')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEnseignantController::deleteAction',));
                }
                not_espenseignant_delete:

            }

            if (0 === strpos($pathinfo, '/espetudiant')) {
                // espetudiant
                if (rtrim($pathinfo, '/') === '/espetudiant') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'espetudiant');
                    }

                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::indexAction',  '_route' => 'espetudiant',);
                }

                // espetudiant_show
                if (preg_match('#^/espetudiant/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espetudiant_show')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::showAction',));
                }

                // espetudiant_new
                if ($pathinfo === '/espetudiant/new') {
                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::newAction',  '_route' => 'espetudiant_new',);
                }

                // espetudiant_create
                if ($pathinfo === '/espetudiant/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_espetudiant_create;
                    }

                    return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::createAction',  '_route' => 'espetudiant_create',);
                }
                not_espetudiant_create:

                // espetudiant_edit
                if (preg_match('#^/espetudiant/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espetudiant_edit')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::editAction',));
                }

                // espetudiant_update
                if (preg_match('#^/espetudiant/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_espetudiant_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espetudiant_update')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::updateAction',));
                }
                not_espetudiant_update:

                // espetudiant_delete
                if (preg_match('#^/espetudiant/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_espetudiant_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'espetudiant_delete')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspEtudiantController::deleteAction',));
                }
                not_espetudiant_delete:

            }

        }

        if (0 === strpos($pathinfo, '/absence')) {
            // absence
            if (rtrim($pathinfo, '/') === '/absence') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'absence');
                }

                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::indexAction',  '_route' => 'absence',);
            }

            // absence_show
            if ($pathinfo === '/absence/show') {
                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::showAction',  '_route' => 'absence_show',);
            }

            // absence_new
            if ($pathinfo === '/absence/new') {
                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::newAction',  '_route' => 'absence_new',);
            }

            // absence_create
            if ($pathinfo === '/absence/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_absence_create;
                }

                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::createAction',  '_route' => 'absence_create',);
            }
            not_absence_create:

            // absence_edit
            if (preg_match('#^/absence/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'absence_edit')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::editAction',));
            }

            // absence_update
            if (preg_match('#^/absence/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_absence_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'absence_update')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::updateAction',));
            }
            not_absence_update:

            // absence_delete
            if (preg_match('#^/absence/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_absence_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'absence_delete')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\AbsenceController::deleteAction',));
            }
            not_absence_delete:

        }

        if (0 === strpos($pathinfo, '/espnote')) {
            // espnote
            if (rtrim($pathinfo, '/') === '/espnote') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'espnote');
                }

                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::indexAction',  '_route' => 'espnote',);
            }

            // espnote_show
            if ($pathinfo === '/espnote/show') {
                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::showAction',  '_route' => 'espnote_show',);
            }

            // espnote_new
            if ($pathinfo === '/espnote/new') {
                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::newAction',  '_route' => 'espnote_new',);
            }

            // espnote_create
            if ($pathinfo === '/espnote/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_espnote_create;
                }

                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::createAction',  '_route' => 'espnote_create',);
            }
            not_espnote_create:

            // espnote_edit
            if (preg_match('#^/espnote/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espnote_edit')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::editAction',));
            }

            // espnote_update
            if (preg_match('#^/espnote/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_espnote_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espnote_update')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::updateAction',));
            }
            not_espnote_update:

            // espnote_delete
            if (preg_match('#^/espnote/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_espnote_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'espnote_delete')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\EspNoteController::deleteAction',));
            }
            not_espnote_delete:

        }

        if (0 === strpos($pathinfo, '/news')) {
            // news
            if (preg_match('#^/news(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::indexAction',  'page' => 1,));
            }

            // news_liste
            if (0 === strpos($pathinfo, '/news/list') && preg_match('#^/news/list(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_liste')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::listAction',  'page' => 1,));
            }

            // news_show
            if (preg_match('#^/news/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_show')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::showAction',));
            }

            // news_new
            if ($pathinfo === '/news/new') {
                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::newAction',  '_route' => 'news_new',);
            }

            // news_create
            if ($pathinfo === '/news/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_news_create;
                }

                return array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::createAction',  '_route' => 'news_create',);
            }
            not_news_create:

            // news_edit
            if (preg_match('#^/news/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_edit')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::editAction',));
            }

            // news_update
            if (preg_match('#^/news/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_news_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_update')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::updateAction',));
            }
            not_news_update:

            // news_delete
            if (preg_match('#^/news/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_news_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_delete')), array (  '_controller' => 'Esprit\\UserBundle\\Controller\\NewsController::deleteAction',));
            }
            not_news_delete:

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/login')) {
                    // sonata_user_admin_security_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::loginAction',  '_route' => 'sonata_user_admin_security_login',);
                    }

                    // sonata_user_admin_security_check
                    if ($pathinfo === '/admin/login_check') {
                        return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::checkAction',  '_route' => 'sonata_user_admin_security_check',);
                    }

                }

                // sonata_user_admin_security_logout
                if ($pathinfo === '/admin/logout') {
                    return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::logoutAction',  '_route' => 'sonata_user_admin_security_logout',);
                }

            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if ($pathinfo === '/admin/core/get-short-object-description') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_route' => 'sonata_admin_short_object_information',);
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/sonata/user')) {
                if (0 === strpos($pathinfo, '/admin/sonata/user/user')) {
                    // admin_sonata_user_user_list
                    if ($pathinfo === '/admin/sonata/user/user/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_list',  '_route' => 'admin_sonata_user_user_list',);
                    }

                    // admin_sonata_user_user_create
                    if ($pathinfo === '/admin/sonata/user/user/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_create',  '_route' => 'admin_sonata_user_user_create',);
                    }

                    // admin_sonata_user_user_batch
                    if ($pathinfo === '/admin/sonata/user/user/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_batch',  '_route' => 'admin_sonata_user_user_batch',);
                    }

                    // admin_sonata_user_user_edit
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_user_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_edit',));
                    }

                    // admin_sonata_user_user_delete
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_user_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_delete',));
                    }

                    // admin_sonata_user_user_show
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_user_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_show',));
                    }

                    // admin_sonata_user_user_export
                    if ($pathinfo === '/admin/sonata/user/user/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_export',  '_route' => 'admin_sonata_user_user_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sonata/user/group')) {
                    // admin_sonata_user_group_list
                    if ($pathinfo === '/admin/sonata/user/group/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_list',  '_route' => 'admin_sonata_user_group_list',);
                    }

                    // admin_sonata_user_group_create
                    if ($pathinfo === '/admin/sonata/user/group/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_create',  '_route' => 'admin_sonata_user_group_create',);
                    }

                    // admin_sonata_user_group_batch
                    if ($pathinfo === '/admin/sonata/user/group/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_batch',  '_route' => 'admin_sonata_user_group_batch',);
                    }

                    // admin_sonata_user_group_edit
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_group_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_edit',));
                    }

                    // admin_sonata_user_group_delete
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_group_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_delete',));
                    }

                    // admin_sonata_user_group_show
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_sonata_user_group_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_show',));
                    }

                    // admin_sonata_user_group_export
                    if ($pathinfo === '/admin/sonata/user/group/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_export',  '_route' => 'admin_sonata_user_group_export',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ($pathinfo === '/group/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ($pathinfo === '/group/new') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupname>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupname>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupname>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        // sdzblog_accueil
        if (preg_match('#^/(?P<page>\\d+)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sdzblog_accueil')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  'page' => 1,));
        }

        // etudiant_eol
        if ($pathinfo === '/etudiant') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => 'etudiant_eol',);
        }

        // admin_eol
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => 'admin_eol',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // sonata_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sonata_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_user_profile_show');
                }

                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'sonata_user_profile_show',);
            }
            not_sonata_user_profile_show:

            if (0 === strpos($pathinfo, '/profile/edit-')) {
                // sonata_user_profile_edit_authentication
                if ($pathinfo === '/profile/edit-authentication') {
                    return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::editAuthenticationAction',  '_route' => 'sonata_user_profile_edit_authentication',);
                }

                // sonata_user_profile_edit
                if ($pathinfo === '/profile/edit-profile') {
                    return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ProfileController::editProfileAction',  '_route' => 'sonata_user_profile_edit',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/change-password/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
