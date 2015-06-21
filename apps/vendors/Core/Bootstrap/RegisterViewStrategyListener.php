<?php

namespace Core\Bootstrap;

use Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Exception;

class RegisterViewStrategyListener
{
    /**
     * @const string
     */
    const DefaultViewStrategyClass = 'Core\Mvc\DefaultViewStrategy';

    public function beforeMergeConfig($event, $application)
    {
        $di = $application->getDI();
        $dispatcher = $di->get('dispatcher');
        $eventsManager = $dispatcher->getEventsManager();
        $config = $di->get('config');
        $view = $di->get('view');

        $currentPath = null;    

        //Attach a listener for type "view"
        $eventsManager->attach("view", function($event, $view) use (&$currentPath) {
           if ($event->getType() == 'beforeRenderView') {
                if (!$currentPath) {
                    $currentPath = $view->getActiveRenderPath();
                } else {
                    throw new Exception('View not found ' . $view->getActiveRenderPath());
                }
//            } else if ($event->getType() == 'notFoundView') {      
//                throw new Exception('View not found ' . $view->getActiveRenderPath());
            } else {
                if ($view->getActiveRenderPath() == $currentPath) {
                    $currentPath = null;
                }
            }
//            echo $event->getType(), ' - ', $view->getActiveRenderPath(), PHP_EOL;
        });

        // Register the view engines
        $view->registerEngines(array(
            '.volt' => function ($view, $di) use ($config) {

                $volt = new VoltEngine($view, $di);
                $volt->setOptions(array(
                    'compiledPath' => $config->config_cache->storage->options->cacheDir,
                    'compiledSeparator' => '_'
                ));
                return $volt;
            },
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        ));

        //Bind the eventsManager to the view component
        $view->setEventsManager($eventsManager);


        // Create a new view
        $class = static::DefaultViewStrategyClass;
        if (isset($config['view_strategy_class'])) {
            $class = $config['view_strategy_class'];
        }
        $strategy = new $class($config, $view);
        $eventsManager->attach('dispatch', $strategy);
    }
}
