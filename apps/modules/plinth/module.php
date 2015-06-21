<?php
namespace Plinth;

use Phalcon\Mvc\ModuleDefinitionInterface;

use Phalcon\Crypt;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;

use VoteWise\Auth\Auth;
use VoteWise\Acl\Acl;
use VoteWise\Mail\Mail;


class Module implements ModuleDefinitionInterface
{
    private static $module = MODULE_ZERO;
    private static $moduleNS = MODULE_ZERO_NS;

    public function __construct()
    {
    }

    public function getModuleName()
    {
        return(self::$module);
    }

    public function getModuleNS()
    {
        return(self::$moduleNS);
    }

    public function registerAutoloaders()
    {
        $nameSpaces = array(
            MODULE_ZERO_NS => MODULE_ZERO_DIR . DS,
        );

        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces($nameSpaces);
        $loader->register();
    }

    public function getConfig()
    {
include_once CONFIG_DIR . "/seo.php";
include_once CONFIG_DIR . "/routes.php";

$controllers = getSeo(self::$module);

// Load each router from the seo.php list
/*
foreach ($controllers as $controller=>$option) {
    // Handle the controller
    array($router->add('/'.$option['url'], array(
    'namespace' => MODULE_ZERO . '\Controllers',
    'module' => MODULE_ZERO,
    'controller' => $controller,
    'action'     => $option['action'],
    ));

   // Handle the route with subcontrollers
   if (isset($option['submenu'])) {
       foreach ($option['submenu'] as $subcontroller => $subOption) {
         $router->add('/'.$option['url'].'/'.$subOption['url'], array(
            'module' => $defaultModule,
            'controller' => $controller,
            'action'     => $subOption['action'],
         ));
       }
   }

}

//return $router;
*/

        $config = [
            'view_strategy' => [
                MODULE_ZERO => [ // module name in lowercase
                    'view_dir'       => MODULE_ZERO_DIR .  DS . 'views' .  DS,
                    'layouts_dir'    => 'layouts' .  DS,
                    'default_layout' => 'layout',
                ],
            ],
            'router' => [
                'not_found_route' => [
                    'module' => MODULE_ZERO,
                    'namespace' => MODULE_ZERO . '\Controllers',
                    'controller' => 'Home',
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
                            'module' => MODULE_ZERO,
                            'namespace' => MODULE_ZERO . '\Controllers',
                            'controller' => 'Home',
                            'action' => 'index',
                        ],
                    ],
                    'home' => [
                        'route' => '/:controller/:action',
                        'defaults' => [
                            'module' => MODULE_ZERO,
                            'namespace' => MODULE_ZERO . '\Controllers',
                            'controller' => 'Home',
                            'action' => 'index',
                        ],
                    ],
                ],
            ],
        ];
        return $config;

    }

    public function onBootstrap($application)
    {
        $di = $application->getDI();
        $eventsManager = $application->getEventsManager();
        // your code here
    }

    public function registerServices($di)
    {
        $config = $di->get('config');

        $nameSpaces = array(
            MODULE_ZERO_NS . DS . 'Controllers' => MODULE_ZERO_DIR . DS . $config->application->controllersDir,
            MODULE_ZERO_NS . DS . 'Models' => MODULE_ZERO_DIR . DS . $config->application->modelsDir,
            MODULE_ZERO_NS . DS . 'Forms' => MODULE_ZERO_DIR . DS . $config->application->formsDir,
        );

        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces($nameSpaces);
        $loader->register();

        // Set defaults for router
        $router = $di->getShared('router');
        $router->setDefaultModule(MODULE_ZERO);
        $router->setDefaultNamespace(MODULE_ZERO . DS . $config->application->controllersDir);
        $router->setDefaultController('home');
        $router->setDefaultAction('index');
        $router->removeExtraSlashes(true);

        // Get the routes for this module
        $module = MODULE_ZERO;
        $moduleNS = MODULE_ZERO_NS;
        require_once CONFIG_DIR . "/routes.php";


        /**
         * The URL component is used to generate all kind of urls in the application
         */
        $di->set('url', function () use ($config) {
            $url = new UrlResolver();
            $url->setBaseUri($config->application->baseUri);
            return $url;
        }, true);

        /**
         * Start the session the first time some component request the session service
         */
        $di->set('session', function () {
            $session = new SessionAdapter();
            $session->start();
            return $session;
        });

        /**
         * If the configuration specify the use of metadata adapter use it or use memory otherwise
         */
        $di->set('modelsMetadata', function () use ($config) {
            return new MetaDataAdapter(array(
                'metaDataDir' => $config->config_cache->storage->options->cacheDir . 'metaData/'
            ));
        });

        /**
         * Crypt service
         */
        $di->set('crypt', function () use ($config) {
            $crypt = new Crypt();
            $crypt->setKey($config->application->cryptSalt);
            return $crypt;
        });

        /**
         * Flash service with custom CSS classes
         */
        $di->set('flash', function () {
            return new Flash(array(
                'error' => 'alert alert-error',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info'
            ));
        });

        $di->set('flashSess', function(){
            $flash = new \Phalcon\Flash\Session(array(
                'error' => 'alert alert-error',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
            ));
            return $flash;
        });

        /**
         * Custom authentication component
         */
        $di->set('auth', function () {
            return new Auth();
        });

        /**
         * Mail service uses AmazonSES
         */
        $di->set('mail', function () {
            return new Mail();
        });

        /**
         * Access Control List
         */
        $di->set('acl', function () {
            return new Acl();
        });

        /**
         * Register a user component
         */
        $di->set('elements', function(){
            return new Elements();
        });

//        $this->setDI($di);
    }
}