<?php session_start();
include("lib/db.class.php");
$host = $_SESSION['host'];
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$name = $_SESSION['db_name'];
$db = new DB($name, $host, $user, $pass);
require "lib/gump.class.php";
$count = $db->countOfAll("store_details");
if ($count > 1) {
    header("location: index.php");
}
if (isset($_POST['submit']) and $_POST['submit'] === 'Upload') {

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 30000)
        && in_array($extension, $allowedExts)
    ) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
            $upload = $_FILES["file"]["name"];
            $type = $_FILES["file"]["type"];
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                unlink("upload/$upload");
            }
            $name = $upload;
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $name);
            $_SESSION['logo'] = $name;
            $upload = $_FILES["file"]["name"];
            $type;
            $db->query("UPDATE store_details  SET log='" . $upload . "',type='" . $type . "'");
            header("location: install_step4.php");
        }
        ?>
        <script type="text/javascript">
            setTimeout("window.location.reload();", 4000);
        </script>
        <?php
    } else {
        echo "<p  style=color:red;margin-left:550px;font-size:20px >Invalid file</p>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POSNIC - Login to Control Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cmxform.css">
    <link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
    <script src="js/lib/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/install_step4.js" type="text/javascript"></script>
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
            <h1>Store Setting </h1>
        </div>
        <a href="#" id="company-branding" class="fr"><img src="<?php if (isset($_SESSION['logo'])) {
                echo "upload/" . $_SESSION['logo'];
            } else {
                echo "upload/samplelogo.jpeg";
            } ?>" alt="Posnic"/></a>
    </div>
</div>
<?php
if (isset($_POST['submit']) and isset($_POST['sname']) and isset($_POST['address']) and $_POST['submit'] == 'Finish') {
    $host = $_SESSION['host'];
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $name = $_SESSION['db_name'];
    $con = mysqli_connect("$host", "$user", "$pass", "$name");
    $name = $_POST['sname'];
    $address = $_POST['address'];
    $place = $_POST['place'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $web = $_POST['website'];
    $email = $_POST['email'];
    $pin = $_POST['pin'];
    $db->query("UPDATE store_details  SET pin='" . $pin . "',city='" . $city . "',name='" . $name . "',email='" . $email . "',web='" . $web . "',address='" . $address . "',place='" . $place . "',phone='" . $phone . "' ");
    echo "<script>window.location = 'index.php';</script>";
}
?>
<div id="content">
    <form action="" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <table>
            <tr>
                <td>

                    <p>
                        <label>Store Name</label>
                        <input type="text" name="sname" id="name" class="round full-width-input"
                               placeholder="Enter Store Name" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="round full-width-input"
                               placeholder="Enter Address" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Place</label>
                        <input type="text" name="place" id="place" class="round full-width-input"
                               placeholder="Enter Place" autofocus/>
                    </p>
                </td>
                <td>
                    <p>
                        <label>City</label>
                        <input type="text" name="city" id="city" class="round full-width-input" placeholder="Enter City"
                               autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Pin</label>
                        <input type="text" name="pin" id="pin" class="round full-width-input" placeholder="Enter Pin"
                               autofocus/>
                    </p>

                </td>
                <td>
                    <p>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="round full-width-input"
                               placeholder="Enter Phone" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Website</label>
                        <input type="text" name="website" id="website" class="round full-width-input"
                               placeholder="Enter Website" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="round full-width-input"
                               placeholder="Enter Email" autofocus/>
                    </p>

                </td>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <input type="submit" class="button round blue image-right ic-right-arrow" name="submit"
                           value="Finish"/>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>

    </form>
    <div style="float: right;margin-top: -350px">
        <form action="" method="POST" id="login-form" class="cmxform" enctype="multipart/form-data">
            <label for="file">Upload Logo:</label><br>
            <input type="file" name="file" id="file"><br><br><br>
            <input type="submit" name="submit" value="Upload" class="button round blue image-right ic-right-arrow">
        </form>
    </div>
</div>
<div id="footer">
</div>
</body>
</html>
