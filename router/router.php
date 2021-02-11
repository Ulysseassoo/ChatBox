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
        getUsersAction();
        break;
    // case 'create-User':
    //     require(__DIR__.'/../controller/AddUserAction.php');
    //     createUserAction(); 
    //     break;
    // case 'Login':
    //     require(__DIR__.'/../controller/LoginUserAction.php');
    //     LoginUserAction();
    //     break;
    // case 'Disconnection':
    //     require(__DIR__.'/../controller/Disconnection.php');
    //     DisconnectUserAction();
    //     break;

    // case 'idea':
    //     if (isset($explodeurl[2])) {
    //         require_once(__DIR__.'/../controller/getIdeaAction.php');
    //         getIdea($explodeurl[2]);
    //     }
    //     break;
}