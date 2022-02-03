<?php
if (session_id() === "") {
    session_start();
}
unset($_SESSION['user']);
session_destroy($_SESSION['user']);
header("Location: login.php");