<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location: index.php?msg=Please%20login%20to%20access%20admin%20area%20!");
}
include("lib/db.class.php");
include_once "config.php";
?>