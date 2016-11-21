<?php
session_start();
//$_SESSION["loggedIn"] = false;
$_SESSION["loggedOut"] = true;
$_SESSION["schoolLoggedIn"] = false;
$_SESSION["studentLoggedIn"] = false;
unset($_SESSION["schooLoggedIn"]);
unset($_SESSION["studentLoggedIn"]);

setcookie("schoolID", NULL, time() - 86400);
setcookie("studentEmail", NULL, time()- 86400);


$redirect = "../index.php";
header('location:'.$redirect);
?>