<?php
require(__DIR__.'/../model/UserManager.php');

function getUsersAction()
{
    $userManager = new UserManager;
    $users = $userManager->ListAllUsersNonActive($_SESSION['email']);
    // require(__DIR__.'/../controller/ConvertToUserAction.php');
    var_dump($_POST);
    var_dump($_SESSION);
    require(__DIR__.'/../view/users.php'); 
     
}




