<?php
session_start();
$_SESSION["loggedIn"] = false;
$_SESSION["loggedOut"] = true;

unset($_SESSION["loggedIn"]);
 

$redirect = "../index.php";
header('location:'.$redirect);
?>