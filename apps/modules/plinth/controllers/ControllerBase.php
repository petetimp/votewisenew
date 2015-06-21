<?php
namespace Plinth\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Tag as Tag;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        Tag::appendTitle(' | VoteWise');
    }

    protected function forward($uri){
       $uriParts = explode('/', $uri);
	     $defaultModule=$this->router->getDefaultModule();
echo '<br />ControllerBase/forward: $defaultModule';
var_dump($defaultModule);
       return $this->dispatcher->forward(
          array(
            'module' => $defaultModule, 
            'controller' => $uriParts[0], 
            'action' => $uriParts[1]
          )
       );
    }
}