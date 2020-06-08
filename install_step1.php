<?php session_start();

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Database</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
    <script src="js/lib/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/install_step1.js" type="text/javascript"></script>
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
            <h1>Masukan Database</h1>
        </div>
          <a href="#" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
    </div>
</div>
<div id="content">
    <form action="install_step2.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <fieldset>
            <p> <?php
                if (isset($_REQUEST['msg'])) {
                    $msg = $_REQUEST['msg'];
                    echo "<p style=color:red>$msg</p>";
                }
                ?>
            </p>
            <p>
                <label for="login-host">DataBase Host Name</label>
                <input type="text" id="host" class="round full-width-input" value="localhost"
                       name="host" autofocus/>
            </p>
            <p>
                <label for="login-user">DataBase User Name</label>
                <input type="text" id="username" name="username" value="root"
                       class="round full-width-input"/>
            </p>
            <p>
                <label for="login-password">DataBase User Password</label>
                <input type="password" id="password" name="password" placeholder=""
                       class="round full-width-input"/>
            </p>
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="SELANJUTNYA"/>
        </fieldset>
    </form>
</div>
<div id="footer">
</div>
</body>
</html>
