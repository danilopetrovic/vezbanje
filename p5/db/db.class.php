<?php
require_once("util.php");

class DBConn
{
    private static $conn;

    private static function SetConnection()
    {
        self::$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (self::$conn->connect_errno) {
            printf("Doslo je do greske prilikom konekcije sa bazom: %s", self::$conn->connect_error);
            exit();
        }
    }

    private static function CloseConnection()
    {
        self::$conn->close();
    }

    // SELECT ID_KORISNIK, USERNAME FROM KORISNIK
    // DBconn::SelectQuery("SELECT ID_KORISNIK, USERNAME FROM KORISNIK");
    public static function SelectQuery($query)
    {
        self::SetConnection();
        $result = self::$conn->query($query);
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value) {
                echo $concreteRow[$key] = $value;
            }
            $resultArray[] = $concreteRow;
        }
        self::CloseConnection();
        return ISSET($resultArray) ? $resultArray : null;
    }
}

//singleton