<?php
session_start();


$url = $_SERVER['REQUEST_URI'];

global $explodeurl;

$explodeurl = explode('/', $url);
var_dump($explodeurl);
// remplacer les arrays avec user id en pseudo;

switch ($explodeurl[1]) {
    case 'homepage':
        require(__DIR__.'/../controller/createUserAction.php');
        createUserAction(); 
        break;
    case 'login':
        require(__DIR__.'/../controller/LoginUserAction.php');
        LoginAction(); 
        break;
    case 'connexion':
        require(__DIR__.'/../controller/getUsersAction.php');
        require(__DIR__.'/../controller/Time_conversion.php');
        getUsersAction();
        break;
    case 'logout':
        require(__DIR__.'/../controller/Logout.php');
        DisconnectUserAction();
        break;
}