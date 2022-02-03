<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "kip_v2");

@$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$query = "SELECT * FROM KORISNIK WHERE USERNAME = 'admin' AND PASSWORD = 'admin'";
$result = $mysqli->query($query);
var_dump($result);

while ($row = $result->fetch_object()) {
    echo "kurac";
    var_dump($row->USERNAME);
}
