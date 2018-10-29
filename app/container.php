<?php 


// Get container
$container = $app->getContainer();

//container debug 

$container['debug'] = function() {
	return true;
};

// Register component on container
$container['view'] = function ($container) {
	$dir = dirname(__DIR__);
    $view = new \Slim\Views\Twig($dir . '/app/views', [
        'cache' => false //$dir .'/tmp/cache' // Hier kann 
    ]);

    // Instantiate and add Slim specific extension

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};
// mailer 
    $container['mailer'] = function ($container) {
	
	if ($container->debug) {

	       $transport = Swift_SmtpTransport::newInstance('localhost', 1025);
	} else {
           $transport = Swift_MailTransport::newInstance();
	}
	
	$mailer = Swift_Mailer::newInstance($transport);
	return $mailer;
};