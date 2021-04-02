<?php
session_start();




$url = $_SERVER['REQUEST_URI'];

global $explodeurl;

$explodeurl = explode('/', $url);
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
    case 'user':
        if (isset($explodeurl[2])) {
            require_once(__DIR__.'/../controller/GetUserChat.php');
            require(__DIR__.'/../controller/Time_conversion.php');
            UserChatbox($explodeurl[2]);
            $_SESSION['receiver_id'] = $explodeurl[2];
            require(__DIR__.'/../controller/createUserRelation.php');
            createRelation();
        }
        break;
}