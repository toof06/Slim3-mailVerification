<?php


require "../vendor/autoload.php";




$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]

]);

require ('../app/container.php');


$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('accueil');

$app->get('/nous-contacter', \App\Controllers\PagesController::class . ':getContact')->setName('contact');
$app->post('/nous-contacter', \App\Controllers\PagesController::class . ':postContact');

$app->get('/profil', \App\Controllers\PagesController::class . ':getProfil')->setName('profil');

$app->run();

