<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location: index.php?msg=Please%20login%20to%20access%20admin%20area%20!&type=error");
}
include("lib/db.class.php");
if (!include_once "config.php") {
    header("location: install_step1.php");
}
$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
require "lib/gump.class.php";
$gump = new GUMP();
$POSNIC = array();
$POSNIC['username'] = $_SESSION['username'];
$POSNIC['usertype'] = $_SESSION['usertype'];
$POSNIC['msg'] = '';
if (isset($_REQUEST['msg']) && isset($_REQUEST['type'])) {

    if ($_REQUEST['type'] == "error")
        $POSNIC['msg'] = "<div class='error-box round'>" . $_REQUEST['msg'] . "</div>";
    else if ($_REQUEST['type'] == "warning")
        $POSNIC['msg'] = "<div class='warning-box round'>" . $_REQUEST['msg'] . "</div>";
    else if ($_REQUEST['type'] == "confirmation")
        $POSNIC['msg'] = "<div class='confirmation-box round'>" . $_REQUEST['msg'] . "</div>";
    else if ($_REQUEST['type'] == "infomation")
        $POSNIC['msg'] = "<div class='information-box round'>" . $_REQUEST['msg'] . "</div>";
}
?>
