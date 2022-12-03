<?php
/*
Vanilla Multiple File Upload Progress Bar Tutorial JS Ajax PHP
Adam Khoury
https://www.youtube.com/watch?v=qoujtAnI4Fc
*/
if (isset($_POST["username"])) {
    foreach ($_FILES as $file) {
        // tmp_name | name | type | size | error
        move_uploaded_file($file['tmp_name'], "uploads/" . $file['name']);
    }
    echo "finished";
}