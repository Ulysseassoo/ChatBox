<?php

require_once(__DIR__.'/../config/Database.php');

class UserManager extends Database
{
    public function insertUser(User $user)
    {
        $query = $this->dbHelper->prepare('INSERT INTO `user`(`pseudo`, `email`, `password`, `profile_img`) VALUES (:pseudo, :email, :password, :profile_img)');
        $query->execute([
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'profile_img' => $user->getProfile_img(),
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

    public function ListAllUsers()
    {
        $query = $this->dbHelper->prepare('SELECT * FROM `user` WHERE 1');
        $query->execute();
        $userManager = $query->fetchAll();
        return $userManager;
    }
}