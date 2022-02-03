<?php
if (session_id() === "") {
    session_start();
}
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

require_once "db/classes/user/user.class.php";
$user = unserialize($_SESSION['user']);
var_dump($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>p5 HOME</title>
</head>
<body>
Dobro dosli :)
<br>
<?php
echo "<strong>".$user->GetUsername()."</strong>";
?>
<br>
<a href="logout.php">Logout</a>
</body>
</html>