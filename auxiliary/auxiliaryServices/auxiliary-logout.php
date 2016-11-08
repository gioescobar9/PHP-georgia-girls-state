<?php
session_start();
$_SESSION["loggedIn"] = false;
$_SESSION["loggedOut"] = false;
unset($_SESSION["admin"]);
unset($_SESSION["loggedIn"]);

// set cookies equal to null if there are any and substract time() - 86400
$redirect = "../index.php";
header('location:'.$redirect);
?>