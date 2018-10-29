<?php 
namespace App\Controllers; 

use psr\Http\Message\RequestInterface;
use psr\Http\Message\ResponseInterface;



class PagesController extends Controller {


     public function home(RequestInterface $request, ResponseInterface $response) 
     {
     	$this->render($response, 'pages/home.html.twig');
     }

     public function getContact(RequestInterface $request, ResponseInterface $response) 
     {
          $this->render($response, 'pages/contact.html.twig');
     }
    
    public function getProfil(RequestInterface $request, ResponseInterface $response)
    {
        $this->render($response, 'pages/profil.html.twig');
    }
     

     public function postContact(RequestInterface $request, ResponseInterface $response)
     {

        $message = \Swift_Message::newInstance('Message de contact')
        ->setFrom([$request->getParam('email') => $request->getParam('name')])
        ->setTo('contact@mywebsite.de')
        ->setBody(" you have received an email by {$request->getParam('name')} with content : {$request->getParam('message')} ");

        $this->mailer->send($message);
        return $this->redirect($response, 'profil');
     }

	
}