<?php

// We define a new class that will serve as our user

class User
{
    private $pseudo;
    private $email;
    private $password;
    private $profile_img;

    public function __construct($pseudo, $email, $password, $profile_img)
    {
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->profile_img = $profile_img;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getProfile_img()
    {
        return $this->profile_img;
    }

}

// We define another class for the connexion 

class UserLogin
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
