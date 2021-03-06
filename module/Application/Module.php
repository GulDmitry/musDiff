<?php

namespace Application;

use Phalcon\Mvc\ModuleDefinitionInterface,
    Phalcon\Loader,
    Phalcon\Tag;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders($di)
    {
        $di->get('loader')->registerNamespaces([
            'Application' => __DIR__ . '/src',
        ], true);
    }

    public function getConfig()
    {
        return [
            'router' => [
                // Handles Dispatcher::EXCEPTION_ACTION_NOT_FOUND, for example http:/phalcon/test.php
                'notFoundRoute' => [
                    'module' => 'Application',
                    'namespace' => 'Application\Controller',
                    'controller' => 'index',
                    'action' => 'notFound',
                ],
                'routes' => [
                    /* The route '/' is default route.
                     * If the default route is not specified, the framework
                     * can not determine the route, respectively, module,
                     * controller and action.
                     */
                    '/' => [
                        'route' => '/',
                        'defaults' => [
                            'module' => 'Application',
                            'namespace' => 'Application\Controller',
                            'controller' => 'index',
                            'action' => 'index',
                        ],
                    ],
                ],
            ],
            'viewStrategy' => [
                'application' => [ // module name in lowercase
                    'viewDir' => __DIR__ . '/view/templates/',
                    'layoutsDir' => '../layouts/', //
                    'defaultLayout' => 'layout',
                ],
            ],
        ];
    }

    public function onBootstrap($application)
    {
        $di = $application->getDI();
        $eventsManager = $application->getEventsManager();
        $config = $di->get('config');

        // Set up layout options.
        Tag::setDoctype($config->application->doctype);
        Tag::setTitle($config->application->title);
    }

    public function registerServices($di)
    {

    }
}
