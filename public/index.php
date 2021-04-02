<?php

session_start();

require_once __DIR__.'/../vendor/autoload.php';


use Bramus\Router\Router;

// Create Router instance
$router = new Router();

$router->get('/', '\App\Controller\UserController@homepage');
$router->post('/', '\App\Controller\UserController@homepage');
$router->get('/login', '\App\Controller\UserController@login');
$router->post('/login', '\App\Controller\UserController@login');
$router->get('/connexion', '\App\Controller\UserController@getUsersAction');
$router->get('/logout', '\App\Controller\UserController@disconnectUserAction');
$router->get('/user/{id}', '\App\Controller\UserController@UserChatbox');
$router->get('/getmessage', '\App\Controller\MessageController@GetAllMessages');
$router->post('/sendmessage', '\App\Controller\MessageController@SendMessageAction');

$router->run();

