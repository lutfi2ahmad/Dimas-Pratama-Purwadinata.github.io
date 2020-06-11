<?php
session_start();
if (!file_exists("config.php") || !include_once "config.php") {
    header("location: install_step1.php");
}
if (!defined('posnicEntry')) {
    define('posnicEntry', true);
}
if (isset($_SESSION['username'])) {
    if ($_SESSION['usertype'] == 'admin')
        header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
    <script src="js/lib/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
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
            <h1>Login untuk masuk</h1>
            <h5>Gunakan akun yang sudah dibuat</h5>
        </div>
        <a href="#" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
    </div>
</div>
<div id="content">
    <form action="checklogin.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <fieldset>
            <p> <?php
                if (isset($_REQUEST['msg']) && isset($_REQUEST['type'])) {
                    if ($_REQUEST['type'] == "error")
                        $msg = "<div class='error-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "warning")
                        $msg = "<div class='warning-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "confirmation")
                        $msg = "<div class='confirmation-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "information")
                        $msg = "<div class='information-box round'>" . $_REQUEST['msg'] . "</div>";
                    echo $msg;
                }
                ?>
            </p>
            <p>
                <label for="login-username">username</label>
                <input type="text" id="login-username" class="round full-width-input" placeholder="admin"
                       name="username" autofocus/>
            </p>
            <p>
                <label for="login-password">password</label>
                <input type="password" id="login-password" name="password" placeholder="admin"
                       class="round full-width-input"/>
            </p>
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="LOG IN"/>
        </fieldset>
            <a href="forget_pass.php" class="button " style="transform:translate(85px, 3px)">Lupa Password?</a>
        <br/>
    </form>
</div>
<?php include_once("tpl/footer.php"); ?>
</body>
</html>
