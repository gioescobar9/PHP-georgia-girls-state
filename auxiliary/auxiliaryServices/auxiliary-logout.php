<?php
session_start();
$_SESSION["loggedIn"] = false;
$_SESSION["loggedOut"] = false;
unset($_SESSION["admin"]);
unset($_SESSION["loggedIn"]);

setcookie("unitNumber", NULL, time() - 86400);
setcookie("auxiliaryEmail", NULL, time()- 86400);
setcookie("auxiliaryID", NULL, time()- 86400); 

$redirect = "../index.php";
header('location:'.$redirect);
?>