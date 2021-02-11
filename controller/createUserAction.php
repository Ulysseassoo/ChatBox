<?php

require(__DIR__.'/../model/UserManager.php');
require(__DIR__.'/../model/User.php');

// To upload an image you need to use the type of file "Blop" on Mysql, and on php, 
// get the filecontent with the gloabl variable $FILES and take it's tmp_name then convert all of that 
// into binary in order to stock it online

function createUserAction()
{
    var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['MAX_FILE_SIZE'])) {
        if ((string)strlen($_POST['pseudo']) > 0 && (string)strlen($_POST['password']) > 0 && (string)strlen($_POST['email']) > 0) {
            $img = $_FILES['userfile']['tmp_name'];
            $user = new User($_POST['pseudo'], $_POST['email'], $_POST['password'], file_get_contents($img));
            $userManager = new UserManager();
            $userManager->insertUser($user);
            var_dump($_FILES['userfile']);
            header("Location: connexion");
        }
    }
    

    require(__DIR__.'/../view/homepage.php');
}