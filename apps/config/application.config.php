<?php

return [
    'application' => [
        'baseUri'        => DS .'Votewisenew' . DS,
        'publicUrl'      => 'votewise.net',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D',
        'controllersDir' =>  'Controllers' . DS,
        'modelsDir'      =>  'Models' . DS,
        'formsDir'       =>  'Forms' . DS,

    ],
    'module_paths' => [
        APPS_DIR . DS . 'library' . DS,
        APPS_DIR . DS . 'migrations' . DS,
        APPS_DIR . DS . 'modules' . DS,
        APPS_DIR . DS . 'plugins' . DS,
        APPS_DIR . DS . 'vendors' . DS,
    ],
    'modules' => [
        MODULE_ZERO,
        MODULE_ONE,
    ],
    'config_cache' => [
        'enabled' => false, // enable or disable configuration caching
        'lifetime' => 86400, // 24 hours
        'storage' => [
            'class' => 'Phalcon\Cache\Backend\File',
            'options' => [
                'cacheDir' => BASE_DIR . DS .'data' . DS . 'cache' . DS,
            ],
        ],
    ],
    'config_glob_paths' => [
        'config/autoload/{,*.}{global,local}.php',
    ],
    'view_strategy_class' => 'Core\Mvc\DefaultViewStrategy',

// These configs can be moved to autoload>application.global.php when it works!
    'admin_language' => 'en', // en. All translations contains in /app/modules/Cms/admin_translations

    'mail' => [
        'fromName' => '',
        'fromEmail' => 'votewise.net',
        'smtp' => [
            'server' => 'smtp.votewise.net',
            'port' => 587,
            'security' => 'tls',
            'username' => '',
            'password' => '',
        ],
    ],


// These configs can be moved to autoload>$module.local.php when it works!
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'strimble',
        'password' => 'yrsL4$',
        'dbname'   => 'votewise_vw',
    ),


];
