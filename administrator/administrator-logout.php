<?php
session_start();
$_SESSION["adminLoggedIn"] = false;
$_SESSION["loggedOut"] = true;
unset($_SESSION["adminLoggedIn"]);

setcookie("unitNumber", NULL, time() - 86400);
setcookie("auxiliaryEmail", NULL, time()- 86400);
setcookie("auxiliaryID", NULL, time()- 86400); 

$redirect = "../auxiliary/index.php";
header('location:'.$redirect)
?>