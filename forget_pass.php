<?php
include("lib/db.class.php");
include_once "config.php";
$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
require "lib/gump.class.php";
$gump = new GUMP();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Shop Logo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
    <script src="js/lib/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("#login-form").validate({
                rules: {
                    name: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please Enter The Answer"
                    }
                }
            });

        });

    </script>
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
            <h1> Lupa password? </h1>
        </div>
          <a href="dashboard.php" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
    </div>
</div>
<div id="content">
    <?php if (isset($_POST['submit']) and isset($_POST['name'])){ ?>
    <fieldset style="margin-left: 600px"><p><?php
            $name = $_POST['name'];
            $count = $db->queryUniqueValue("select sum(id) FROM stock_user where answer ='" . $name . "'");
            if ($count > 0){
            $line = $db->queryUniqueObject("SELECT * FROM stock_user where answer ='" . $name . "'");
            echo " User Name: <strong style=color:blue> $line->username </strong> <br><br>";
            echo " Password: <strong style=color:blue>  $line->password </strong> ";
            ?>
            <br> <br> <br> <a href="index.php" class="button blue round side-content">Dashboard</a>
        <?php
        } else {
            $data = "Answer Is Wrong";
            echo "<script>window.location = 'forget_pass.php?msg=$data';</script>";
        }
        echo "</p></fieldset>";
        } else {
            ?>
            <fieldset>
            <p style="margin-left: 600px;color: red;font-size: 20px"> <?php
                if (isset($_REQUEST['msg'])) {
                    $msg = $_REQUEST['msg'];
                    echo $msg;
                }
                ?>
            </p>
            <form action="forget_pass.php" method="POST" id="login-form" class="cmxform" enctype="multipart/form-data">
                Siapa nama ibu anda?
                <input type="text" name="name" id="name" class="round full-width-input"><br><br>
                <input type="submit" name="submit" value="Submit" class="button round blue image-right ic-right-arrow">
                <a href="index.php" class="button blue round side-content">Dashboard</a>
            </form>
            </fieldset>
        <?php } ?>
</div>
<div id="footer">
</div>
</body>
</html>
