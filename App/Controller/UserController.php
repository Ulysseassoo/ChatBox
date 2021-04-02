<?php

namespace App\Controller;

use App\Model\UserModel;
use Framework\Controller;

require __DIR__.'/Time_conversion.php';

class UserController extends Controller
{
    public function homepage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['MAX_FILE_SIZE'])) {
            if ((string)strlen($_POST['pseudo']) > 0 && (string)strlen($_POST['password']) > 0 && (string)strlen($_POST['email']) > 0) {
                $img = $_FILES['userfile']['tmp_name'];
                $userModel = new UserModel();
                $userModel->insertUser($_POST['pseudo'], $_POST['email'], $_POST['password'], file_get_contents($img), date('H:i:s'));
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['id'] = $userModel->FetchUserFromSession($_SESSION['email'])['id'];
                header("Location: connexion");
            }
        }
        $this->renderTemplate('homepage.html.twig');
    }

    public function login()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            if ((string)strlen($_POST['password']) > 0 && (string)strlen($_POST['email']) > 0) {
                $userModel = new UserModel();
                $checkUser = $userModel->CheckLoginUser($_POST['email'], $_POST['password']);
                $userModel->UpdateTime($_POST['email']);
                if ($checkUser === true) {
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['id'] = $userModel->FetchUserFromSession($_SESSION['email'])['id'];
                    header("Location: connexion");
                }
                else if ($checkUser === false){
                    $errors = "Vous n'avez pas entrer les bonnes informations";
                }
            }
        }

        $this->renderTemplate('login.html.twig', [
            'errors' => $errors,
        ]);
    }
    public function getUsersAction() 
    {
        $userModel = new UserModel();
        $users = $userModel->ListAllUsersNonActive($_SESSION['email']);
        $user = $userModel->FetchUserFromSession($_SESSION['email']);
        $time = TimeConversion($user['recent_connexion']);
        $img = base64_encode($user['profile_img']);
        for ($i=0; $i < sizeOf($users); $i++) { 
            $users[$i]['profile_img'] = base64_encode($users[$i]['profile_img']);
            $user[$i]['recent_connexion'] = TimeConversion($users[$i]['recent_connexion']);
        }
        // dd($users);
        $this->renderTemplate('users.html.twig', [
            "users" => $users,
            "session" => $_SESSION,
            "user" => $user,
            'time' => $time,
            "img" => $img
        ]);
    }
    public function userChatBox($id) 
    {
        $user_chatbox = new UserModel;
        $user_chat = $user_chatbox->UserChat($id);
        $userRelation = new UserRelationController();
        $userRelation->createRelation();
        $user_chat['profile_img'] = base64_encode($user_chat['profile_img']);
        $user_chat['recent_connexion'] = TimeConversion($user_chat['recent_connexion']);
        $_SESSION['receiver_id'] = $id;
        $this->renderTemplate('chatbox.html.twig', [
            "user_chat" => $user_chat,
        ]);
    }
    public function disconnectUserAction()
    {
        if (isset($_SESSION['email'])) {
            session_start();
            session_destroy();
            header('Location: /');
        }
    }
}