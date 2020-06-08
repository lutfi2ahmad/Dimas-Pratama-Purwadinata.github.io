<?php
session_start();
include("lib/db.class.php");
include_once "config.php";
$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
$tbl_name = "stock_user";
$myusername = $_REQUEST['username'];
$mypassword = $_REQUEST['password'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($db->connection, $myusername);
$mypassword = mysqli_real_escape_string($db->connection, $mypassword);
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($db->connection, $sql);
$count = mysqli_num_rows($result);
if ($count == 1) {
    $row = mysqli_fetch_row($result);
    $_SESSION['id'] = $row[0];
    $_SESSION['username'] = $row[1];
    $_SESSION['usertype'] = $row[3];
    if ($row[3] == "admin")
        header("location: dashboard.php");
    else
        die("Not Valid User Type. Check with your application administartor");

} else {
    header("location: index.php?msg=Wrong%20Username%20or%20Password&type=error");
}
?>
