<?php
namespace Core\Mvc;

use Phalcon\Mvc\Application as MvcApplication,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\Router,
    Phalcon\Mvc\View,
    //
    Phalcon\DI\FactoryDefault as DiFactory,
    Phalcon\Http\Response,
    Phalcon\Config,
    //
    Phalcon\Debug,
    //
    Exception;

class Application extends MvcApplication
{
    /**
     * Define some useful constants
     */

    const DEFAULT_MODULE    = MODULE_ZERO;

    const MODE_PRODUCTION   = 'prod';
    const MODE_STAGING      = 'staging';
    const MODE_TEST         = 'test';
    const MODE_DEVELOPMENT  = 'dev';

    /**
     * @var string
     */
    private static $mode    = 'dev';

    /**
     * @var array
     */
    private static $modules;

    /**
     * @var boolean
     */
    protected static $debugMode = false;

    /**
     * @var array
     */
    protected $defaultBootstrapListeners = [
        // bootstrap:init
        'Core\Bootstrap\RegisterModulesPathsListener',
        'Core\Bootstrap\RegisterModulesListener',
        'Core\Bootstrap\LoadModulesListener',

        // bootstrap:beforeMergeConfig
        'Core\Bootstrap\RegisterViewStrategyListener',

        // bootstrap:mergeConfig
        'Core\Bootstrap\ConfigCacheListener',
        'Core\Bootstrap\MergeGlobConfigListener',
        'Core\Bootstrap\MergeModulesConfigListener',

        // bootstrap:afterMergeConfig
        'Core\Bootstrap\RegisterDIListener',
        'Core\Bootstrap\RegisterRoutesListener',

        // bootstrap:bootstrapModules
        'Core\Bootstrap\BootstrapModulesListener',
    ];

    /**
     * Set application mode and error reporting level.
     */

    /**
     * @return void
     */
    public function __construct()
    {
        if (!defined('PHALCON_MODE')) {
            $mode = getenv('PHALCON_MODE');
            $mode = $mode ? $mode : self::$mode;
            define('PHALCON_MODE', $mode);
        }

        switch (self::getMode()) {
            case self::MODE_PRODUCTION:
            case self::MODE_STAGING:
                error_reporting(0);
                break;

            case self::MODE_TEST:
            case self::MODE_DEVELOPMENT:
                error_reporting(E_ALL);
                break;
        }
    }

    /**
     * @return boolean
     */
    public static function getMode()
    {
        return self::$mode;
    }

    /**
     * @param boolean $flag
     * @return void
     */
    public static function setDebugMode($flag = true)
    {
        $reportingLevel = $flag ? E_ALL | E_STRICT : 0;
        error_reporting($reportingLevel);

        static::$debugMode = (bool) $flag;

        if (static::$debugMode) {
            $Debug = new \Phalcon\Debug();
            $Debug->listen();
        }
    }

    /**
     * @return boolean
     */
    public static function isDebugMode()
    {
        return static::$debugMode;
    }

    /**
     * @param array $configuration
     * @return Core\Mvc\Application
     */
    public static function init($configuration = [])
    {
        static $application;

        if ($application instanceof Application) {
            return $application;
        }

        Application::setDebugMode(Application::isDebugMode());

        $config = new Config($configuration);
        $di = new DiFactory();
        $di->setShared('config', $config);

        $application = new Application();
        $application->setDI($di);

        $eventsManager = $di->getShared('eventsManager');
        $application->setEventsManager($eventsManager);

        $dispatcher = new Dispatcher();
        $dispatcher->setEventsManager($eventsManager);
        $di->setShared('dispatcher', $dispatcher);

        $router = new Router();
        $di->setShared('router', $router);

        $view = new View();
        $di->setShared('view', $view);

        return $application->bootstrap();
    }

    /**
     * @return Core\Mvc\Application
     */
    public function bootstrap()
    {
        $eventsManager = $this->getEventsManager();

        foreach ($this->defaultBootstrapListeners as $listener) {
            $listener = new $listener();
            $eventsManager->attach('bootstrap', $listener);
        }

        return $this;
    }

    /**
     * @param string $url optional
     * @return Phalcon\Http\ResponseInterface
     */
    public function handle($url = '')
    {
        try {
            $eventsManager = $this->getEventsManager();
//echo                       '<br />bootstrap:init<br />';
            $eventsManager->fire('bootstrap:init', $this);
//echo                       '<br />bootstrap:beforeMergeConfig:<br />';
            $eventsManager->fire('bootstrap:beforeMergeConfig', $this);
//echo                       '<br />bootstrap:mergeConfig:<br />';
            $eventsManager->fire('bootstrap:mergeConfig', $this);
//echo                       '<br />bootstrap:afterMergeConfig:<br />';
            $eventsManager->fire('bootstrap:afterMergeConfig', $this);
//echo                       '<br />bootstrap:bootstrapModules:<br />';
            $eventsManager->fire('bootstrap:bootstrapModules', $this);
//echo                       '<br />bootstrap:beforeHandle:<br />';
            $eventsManager->fire('bootstrap:beforeHandle', $this);
//echo      '<br />parent::handle:<br />';
            $pHandle = parent::handle($url);
            return $pHandle;

        } catch (Exception $e) {
            if (Application::isDebugMode()) {
                (new Debug())->onUncaughtException($e);
            }
            return new Response();
        }
    }
}






