<?php
// public/index.php
// set defines
if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__));
}

require_once ROOT.'/apps/config/defines.php';

// set error reporting
error_reporting(E_ALL);

// verify php and phalcon versions are what's needed
if (version_compare(PHP_VERSION, '5.4.0', '<=')) {
    exit(sprintf(
        'To run this application required PHP >= 5.4.0 Current version is %s.',
        PHP_VERSION
    ));
}

if (! extension_loaded('phalcon')) {
    exit('Phalcon extension is not installed. See http://phalconphp.com/en/download');
}
// \Phalcon\Version::get();


chdir(dirname(__DIR__));
require 'init_autoloader.php';

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

use Core\Mvc\Application;

Application::setDebugMode(true);

try {
    // Run application:
    $application = Application::init(require CONFIG_DIR . DS . 'application.config.php');
    echo $application->handle()->getContent();
} catch(Phalcon\Exception $e) {
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
} catch (PDOException $e){
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}
