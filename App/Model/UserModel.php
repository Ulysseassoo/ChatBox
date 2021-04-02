<?php
namespace App\Model;

use Framework\Model;
use \PDO;

class UserModel extends Model
{
    public function insertUser($pseudo, $email, $password, $profile_img, $recent_connexion)
    {
        $db = $this->getDb();
        $query = $db->prepare('INSERT INTO `user`(`pseudo`, `email`, `password`, `profile_img`, `recent_connexion`) VALUES (:pseudo, :email, :password, :profile_img, :recent_connexion)');
        $query->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $password,
            'profile_img' => $profile_img,
            'recent_connexion' => $recent_connexion,
        ]);
    }

    public function CheckLoginUser($email, $password)
    {
        $db = $this->getDb();
        $query = $db->prepare("SELECT * FROM `user` WHERE `email` = :email AND `password` = :password");
        $query->execute([
            'email' => $email,
            'password' => $password
        ]);
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
        $db = $this->getDb();
        $query = $db->prepare('SELECT * FROM `user` WHERE email NOT IN ( SELECT email FROM `user` WHERE email = :email)');
        $query->execute([
            'email' => $email
        ]);
        $userManager = $query->fetchAll(PDO::FETCH_ASSOC);
        return $userManager;
    }

    public function FetchUserFromSession($email)
    {
        $db = $this->getDb();
        $query = $db->prepare('SELECT * FROM `user` WHERE `email` = :email');
        $query->execute([
            'email' =>  $email
        ]);

        $userManager = $query->fetch(PDO::FETCH_ASSOC);

        return $userManager;
    }

    public function UpdateTime($email)
    {
        $date = new \DateTime();
        $db = $this->getDb();
        $query = $db->prepare("UPDATE `user` SET `recent_connexion` = :date WHERE `user`.`email` = :email");
        $query->execute([
            'email' => $email,
            'date' =>  $date->format('Y-m-d H:i:s')
        ]);
    }

    public function UserChat($id) 
    {
        $db = $this->getDb();
        $query = $db->prepare('SELECT * FROM `user` WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
    
        $user_chat = $query->fetch(PDO::FETCH_ASSOC);
    
        return $user_chat;
    }
}