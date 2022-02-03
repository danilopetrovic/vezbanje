<?php
require_once "db/db.class.php";

class BookDAL /*data access layer (nesto sto komunicira sa bazom podataka)*/
{
    private $ID;
    private $title;
    private $coverPage;
    private $genreID;
    private $genreName;


    private function SetBookFromDB($book)
    {
        if ($book != null) {
            $this->ID = $book['ID_KNJIGA'];
            $this->title = $book['NASLOV'];
            $this->coverPage = $book['NASLOVNICA'];
            $this->genreID = $book['ID_OBLAST'];
            $this->genreName = $book['NAZIV_OBLAST'];
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