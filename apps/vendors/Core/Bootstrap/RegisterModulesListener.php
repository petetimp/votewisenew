<?php

namespace Core\Bootstrap;

use Core\Exception\DomainException;
use Phalcon\Text;

class RegisterModulesListener
{
    public function init($event, $application)
    {

        $di = $application->getDI();
        $config = $di->get('config');

        $modulesConfig = [];
        if (isset($config['modules'])) {
            foreach ($config['modules'] as $module) {
                $simple = $module;
//                $simple = strtolower($module);
//                $simple = Text::uncamelize($module);
//                $simple = str_replace('_', '-', $simple);
                $modulesConfig[$simple] = [
                    'className' => ucfirst($module) . '\\Module',
                    'path' => MODULES_DIR . DS . strtolower($module) . DS . 'module.php',
                ];
            }
        }

        if (empty($modulesConfig)) {
            throw new DomainException(
                'Missing configuration of modules.'
            );
        }
        $application->registerModules($modulesConfig, true);
    }
}
