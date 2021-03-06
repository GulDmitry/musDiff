<?php

namespace CLI;

use Phalcon\Mvc\ModuleDefinitionInterface,
    Phalcon\Loader,
    Symfony\Component\Console\Application as ConsoleApp;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders($di)
    {
        $di->get('loader')->registerNamespaces([
            'CLI' => __DIR__ . '/src',
        ], true);
    }

    public function getConfig()
    {
        return [
            'router' => [
                'routes' => [
                    'main' => [
                        'defaults' => [
                            // No need to set a module.
                            'namespace' => 'CLI\Task',
                            'task' => 'main',
                            'action' => 'main',
                            'description' => 'The main route',
                        ],
                    ],
                    'help' => [
                        'defaults' => [
                            'namespace' => 'CLI\Task',
                            'task' => 'main',
                            'action' => 'help',
                            'description' => 'Displays all available routes',
                        ],
                    ],
                    'parameterized-task' => [
                        'defaults' => [
                            'namespace' => 'CLI\Task',
                            'task' => 'main',
                            'action' => 'test',
                            'description' => 'Test options',
                        ],
                    ],
                    'clear-all' => [
                        'defaults' => [
                            'namespace' => 'CLI\Task',
                            'task' => 'cache',
                            'action' => 'clearAll',
                            'description' => 'Clears all cached stuff including assets',
                        ],
                    ],
                    'get-routes' => [
                        'defaults' => [
                            'namespace' => 'CLI\Task',
                            'task' => 'route',
                            'action' => 'availableMvcRoutes',
                            'description' => 'Displays available modules with routes',
                        ],
                    ],
                    'untranslated-labels' => [
                        'defaults' => [
                            'namespace' => 'CLI\Task',
                            'task' => 'translation',
                            'action' => 'getUntranslatedlabels',
                            'description' => 'Compares all labels with default language',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function onBootstrap($application)
    {
        $di = $application->getDI();
        $di->set('console', new ConsoleApp());
    }

    public function registerServices($di)
    {

    }
}
