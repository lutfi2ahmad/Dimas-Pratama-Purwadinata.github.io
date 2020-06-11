<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Daftar Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
    <script src="js/lib/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/install_step3.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div id="top-bar">
    <div class="page-full-width">
    </div>
</div>
<div id="header">
    <div class="page-full-width cf">
        <div id="login-intro" class="fl">
            <h1>Biodata Admin </h1>
        </div>
                <a href="#" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
    </div>
</div>
<?php
include("lib/db.class.php");
$host = $_SESSION['host'];
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$name = $_SESSION['db_name'];
$db = new DB($name, $host, $user, $pass);
require "lib/gump.class.php";
if (isset($_POST['submit']) and isset($_POST['uname']) and isset($_POST['password']) and isset($_POST['answer'])) {
    $host = $_SESSION['host'];
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $name = $_SESSION['db_name'];
    $con = mysqli_connect("$host", "$user", "$pass", "$name");
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $answer = $_POST['answer'];
    $db->query("UPDATE stock_user  SET username ='" . $uname . "',password='" . $password . "',answer='" . $answer . "'");
    echo "<script>window.location = 'index.php';</script>";
}
?>
<div id="content">
    <form action="" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <fieldset>
            <p>
                <label>Username</label>
                <input type="text" name="uname" id="uname" class="round full-width-input" placeholder="masukkan username"
                       autofocus/>
            </p>
            <p>
                <label>Password</label>
                <input type="password" name="password" id="password" class="round full-width-input"
                       placeholder="masukkan password" autofocus/>
            </p>
            <p>
                <label>Pertanyaan Rahasia</label>
                Siapa nama ibu anda?
                <input type="text" name="answer" id="answer" class="round full-width-input" placeholder="masukkan jawaban"
                       autofocus/>
            </p>
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="SELANJUTNYA"/>
            &nbsp;</fieldset>
    </form>
</div>
<?php include_once("tpl/footer.php"); ?>
</body>
</html>
