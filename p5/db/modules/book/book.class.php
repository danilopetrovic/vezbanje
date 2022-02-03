<?php
require_once "db/db.class.php";
require_once "db/classes/book/book.class.php";


class BookModulesDAL /*data access layer (nesto sto komunicira sa bazom podataka)*/
{
    public function GetBooks()
    {
        $query = sprintf("SELECT k.ID_KNJIGA, k.NASLOV, k.NASLOVNICA, k.ID_OBLAST, o.naziv as NAZIV_OBLAST
                                FROM KNJIGA k 
                                JOIN OBLAST o ON k.ID_OBLAST = o.ID_OBLAST");
        $result = DBConn::SelectQuery($query);
        if ($result != null && count($result) > 0) {
            foreach ($result as $bookDB) {
                $book = new BookDAL();
                $book->SetBookFromDB($bookDB);
                $books[] = $book;
            }
        }
        return isset($books) ? $books : null;
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