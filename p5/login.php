<?php
if (session_id() === "") {
    session_start();
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}
//require_once "db/db.class.php";
require_once "db/classes/user/user.class.php";
if (isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
//$query = sprintf("SELECT * FROM KORISNIK where USERNAME = '%s' AND pASSWORD = '%s'", $username, $password);
//$result = DBConn::SelectQuery($query);
//var_dump($result);
    $user = new UserDAL();
    $isLogged = $user->LoginUserData($username, $password);
    var_dump($isLogged);
    if ($isLogged == true) {
        $_SESSION["user"] = serialize($user);
        header("Location: home.php");
    } else {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SQL p5</title>
    <link rel="StyleSheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" href="favicon.png">
    <script src="js/validacija.js"></script>
</head>

<body>
<div id="login-box">
    <form action="login.php" method="POST" name="login" onsubmit="return IsFormValid()">
        <div class="sp_20">
            <div>
                <div class="txt_left ft_bold">
                    Username:
                </div>
                <div class="txt_left sp_5">
                    <input type="text" name="username" class="input_txt_lg " onblur="blurPolje(this)"/>
                </div>
                <div>
                    <span id="usernameSpan" class="ft_small ft_red"></span>
                </div>
            </div>
            <div class="sp_20">
                <div class="txt_left ft_bold">
                    Password:
                </div>
                <div class="txt_left sp_5">
                    <input type="password" name="password" class="input_txt_lg " onblur="blurPolje(this)"/>
                </div>
                <div>
                    <span id='passwordSpan' class='ft_small ft_red'></span>
                </div>
            </div>
            <div class="sp_40">
                <div class="txt_left">
                    <input type="submit" name="btnSubmit" value="Log In" class="input_sbmt_lg"/>
                </div>
            </div>
        </div>
    </form>
    <div class="wrap10 txt_center ft_small">
        markostojicevic.com &copy; 2015
    </div>
</div>

</body>
</html>
