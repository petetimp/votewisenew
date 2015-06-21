<?php

namespace QA;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector=null)
    {
        $nameSpaces = array(
            MODULE_ONE_NS => MODULE_ONE_DIR . DS,
        );
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces($nameSpaces);
        $loader->register();
    }

    public function getConfig()
    {
        $config = [
            'view_strategy' => [
                MODULE_ONE => [ // module name in lowercase
                    'view_dir'       => MODULE_ONE_DIR .  DS . 'views' .  DS,
                    'layouts_dir'    => 'layouts' .  DS,
                    'default_layout' => 'layout',
                ],
            ],
        ];
        return $config;
    }

    public function registerServices($di)
    {
        $config = $di->get('config');

        $nameSpaces = array(
            MODULE_ONE_NS . DS . 'Controllers' => MODULE_ONE_DIR . DS . $config->application->controllersDir,
            MODULE_ONE_NS . DS . 'Models' => MODULE_ONE_DIR . DS . $config->application->modelsDir,
            MODULE_ONE_NS . DS . 'Forms' => MODULE_ONE_DIR . DS . $config->application->formsDir,
        );

        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces($nameSpaces);
        $loader->register();

        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace(MODULE_ONE_NS . DS . "Controller");
    }
}
