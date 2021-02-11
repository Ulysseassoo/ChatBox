<?php

require_once(__DIR__.'/../config/Database.php');

class UserManager extends Database
{
    public function insertUser(User $user)
    {
        $query = $this->dbHelper->prepare('INSERT INTO `user`(`pseudo`, `email`, `password`, `profile_img`, `recent_connexion`) VALUES (:pseudo, :email, :password, :profile_img, :recent_connexion)');
        $query->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'profile_img' => $user->getProfile_img(),
            'recent_connexion' => $user->getTime(),
        ]);
    }

    public function LoginUser(UserLogin $user)
    {
        $email = $user->getEMail();
        $password = $user->getPassword();
        $query = $this->dbHelper->prepare("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
        $query->execute();
        if ($query->rowCount() > 0) {
            $data = $query->fetch();
            return true;
        }
        else {
            return false;
        }
    }

    public function ListAllUsersNonActive($email)
    // Here we fetch all the users that are not connected and show them in order for the user to click on them and chat with
    {
        $query = $this->dbHelper->prepare('SELECT * FROM `user` WHERE email NOT IN ( SELECT email FROM `user` WHERE email = :email)');
        $query->execute([
            'email' => $email
        ]);
        $userManager = $query->fetchAll();
        return $userManager;
    }

    public function FetchUserFromSession($email)
    {
        $query = $this->dbHelper->prepare('SELECT * FROM `user` WHERE `email` = :email');
        $query->execute([
            'email' =>  $email
        ]);

        $userManager = $query->fetch();

        return $userManager;
    }

    public function UpdateTime(UserLogin $user)
    {
        $query = $this->dbHelper->prepare("UPDATE `user` SET `recent_connexion` = CURRENT_TIME() WHERE `user`.`email` = :email");
        $query->execute([
            'email' => $user->getEmail(),
        ]);
    }
}