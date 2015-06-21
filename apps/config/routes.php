<?php
use Phalcon\Mvc\Router;

include_once CONFIG_DIR . "/seo.php";
// Add routes for each module

/* $router->add("/login", array(
  'controller' => 'session',
  'action' => 'index',
));
*/
$routes = array();
$route = array();
$defualts = array();

$controllers = getSeo(strtolower(self::$module));

// Load each router from the seo.php list
foreach ($controllers as $controller=>$option) {
    // Handle the controller
    $defaults['module'] = self::getModuleName();
    $defaults['namespace'] = self::getModuleNS() . DS . 'Controllers' ;
    $defaults['controller'] = $controller;
    $defaults['action'] = $option['action'];

    $route['route'] = '/'.$option['url'];
    $route['defaults'] = $defaults;

    $routes[$controller] = $route;

    // Handle the route with subcontrollers
    if (isset($option['submenu'])) {
      foreach ($option['submenu'] as $subcontroller => $subOption) {
        $defaults['module'] = self::getModuleName();
        $defaults['namespace'] = self::getModuleNS() . DS . 'Controllers' ;
        $defaults['controller'] = $controller;
        $defaults['action'] = $subOption['action'];

        $route['route'] = '/'.$option['url'].'/'.$subOption['url'];
        $route['defaults'] = $defaults;

        $routes[$subcontroller] = $route;
      }
    }
}

return $routes;


/*
  // add routes for each topic/issue page
//    $router->add('/'.'voter-concerns-'. $issue, array(
  $topics = getIssues($defaultModule);
  foreach ($topics as $issue=>$caption) {
    $router->add('/'.'voter-concerns', array(
      'module' => $defaultModule,
      'controller' => 'SubTopic',
      'action'     => 'index',
      'params'     => $issue,
    ));
  }
*/

/*
foreach ($modules as $moduleName => $module) {

   // do not route default module
   if ($defaultModule == $moduleName) {
      continue;
   }

   $router->add('#^/'.$moduleName.'(|/)$#', array(
      'module' => $moduleName,
      'controller' => 'index',
      'action' => 'index',
   ));

   $router->add('#^/'.$moduleName.'/([a-zA-Z0-9\_]+)[/]{0,1}$#', array(
      'module' => $moduleName,
      'controller' => 1,
   ));

   $router->add('#^/'.$moduleName.'[/]{0,1}([a-zA-Z0-9\_]+)/([a-zA-Z0-9\_]+)(/.*)*$#', array(
      'module' => $moduleName,
      'controller' => 1,
      'action' => 2,
      'params' => 3,
   ));
}
*/
