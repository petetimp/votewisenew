<?php
defined('DEBUG') || define('DEBUG', true);

defined ('DS') || define('DS', DIRECTORY_SEPARATOR);

defined('PUBLIC_PATH') || define('PUBLIC_PATH', ROOT);
defined('BASE_DIR')    || define('BASE_DIR', ROOT);
defined('APPS_DIR')    || define('APPS_DIR', BASE_DIR . DS . 'apps');

defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
defined('APPLICATION_PATH') || define('APPLICATION_PATH', (APPLICATION_ENV == 'development') ? APPS_DIR : APPS_DIR);
defined('HOST_HASH') || define('HOST_HASH', substr(md5($_SERVER['HTTP_HOST']), 0, 12));

defined('CONFIG_DIR')  || define('CONFIG_DIR', APPS_DIR . DS . 'config');
defined('LIBRARY_DIR') || define('LIBRARY_DIR', APPS_DIR . DS . 'library');
defined('MODULES_DIR') || define('MODULES_DIR', APPS_DIR . DS . 'modules');
defined('PLUGINS_DIR') || define('PLUGINS_DIR', APPS_DIR . DS . 'plugins');
defined('VENDORS_DIR') || define('VENDORS_DIR', APPS_DIR . DS . 'vendors');

// Defines for current project
defined('APPNAME') || define('APPNAME', 'VoteWise');

defined('MODULE_ZERO') || define('MODULE_ZERO', 'Plinth');
defined('MODULE_ZERO_NS')     || define('MODULE_ZERO_NS', 'Plinth');
defined('MODULE_ZERO_DIR')    || define('MODULE_ZERO_DIR', MODULES_DIR . DS . 'plinth');

defined('MODULE_ONE') || define('MODULE_ONE', 'QA');
defined('MODULE_ONE_NS') || define('MODULE_ONE_NS', 'QA');
defined('MODULE_ONE_DIR') || define('MODULE_ONE_DIR', MODULES_DIR . DS . 'QA');

defined('MODULE_TWO') || define('MODULE_TWO', 'VW');
defined('MODULE_TWO_NS') || define('MODULE_TWO_NS', 'VW');
defined('MODULE_TWO_DIR') || define('MODULE_TWO_DIR', MODULES_DIR . DS . 'VW');

// Defines used in seo menu 
defined('CONTROLLER') || define('CONTROLLER', 'C');
defined('INDEX') || define('INDEX', 'I');
defined('OPTIONS') || define('OPTIONS', 'O');
defined('URL_LINK') || define('URL_LINK', 'U');


