<?php 
namespace App\Controllers; 

use psr\Http\Message\RequestInterface;
use psr\Http\Message\ResponseInterface;


class Controller
{
	private $container; 

     public function __construct($container)
     {
     	$this->container = $container;
     }
     public function render(ResponseInterface $response, $file) {
     	$this->container->view->render($response, $file);
     }

     public function redirect($response, $name) {
     	return $response->withStatus(302)->withHeader('location', $this->router->pathFor($name));
     }

     public function __get($name) { 
     	return $this->container ->get($name);
     }

}