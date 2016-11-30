<?php
session_start();
$_SESSION["adminLoggedIn"] = false;
$_SESSION["adminLoggedOut"] = true;
unset($_SESSION["adminLoggedIn"]);
//unset($_SESSION["loggedIn"]);


$redirect = "../auxiliary/index.php";
header('location:'.$redirect)
?>