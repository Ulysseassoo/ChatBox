<?php 

require(__DIR__.'/../model/UserManager.php');
require(__DIR__.'/../model/User.php');


function LoginAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
        if ((string)strlen($_POST['password']) > 0 && (string)strlen($_POST['email']) > 0) {
            $user = new UserLogin($_POST['email'], $_POST['password']);
            $usermanager = new UserManager();
            $usermanager->LoginUser($user);
            if ($usermanager->LoginUser($user) === true) {
                $_SESSION['email'] = $user->getEmail();
                echo "Vous venez de vous login<br>";
            }
            else if ($usermanager->LoginUser($user) === false){
                echo "Vous n'avez pas entrer les bonnes informations";
            }
        }
    }

    require(__DIR__.'/../view/login.php');
}