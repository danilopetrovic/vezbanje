<?php
require_once "db/db.class.php";

class UserDAL /*data access layer (nesto sto komunicira sa bazom podataka)*/
{
    private $ID;
    private $username;
    private $password;
    private $email;
    private $lastLoginDate;
    private $statusID;

    public function LoginUserData($username, $password)
    {
        $query = sprintf("SELECT * FROM KORISNIK where USERNAME = '%s' AND PASSWORD = '%s'", $username, $password);
        $result = DBConn::SelectQuery($query);
        var_dump($result);
        self::SetUserFromDB($result);
        $isLogged = false;
        if ($this->ID > 0) {
            $isLogged = true;
        }
        return $isLogged;
    }

    private function SetUserFromDB($userDB)
    {
        if ($userDB != null && count($userDB) == 1) {
            $userData = $userDB[0];

            $this->ID = $userData['ID_KORISNIK'];
            $this->username = $userData['USERNAME'];
            $this->password = $userData['PASSWORD'];
            $this->email = $userData['EMAIL'];
            $this->lastLoginDate = $userData['POSLEDNJE_LOGOVANJE'];
            $this->statusID = $userData['ID_STATUS'];
        }
    }

    public function GetID()
    {
        return $this->ID;
    }

    public function GetUsername()
    {
        return $this->username;
    }
}