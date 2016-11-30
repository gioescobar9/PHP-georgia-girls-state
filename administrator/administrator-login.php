<?php
session_start();
require_once 'adminisrtator-connect-db.php';

$auxConnection = connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];

// we check and see if the user name and password is accurate...we set a redirect page for either case

$query = "SELECT * FROM auxiliary WHERE unitNumber = '$username' AND password = '$password';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);
if($result->num_rows > 0)
	$_SESSION["adminLoggedIn"] = true;
else
	$_SESSION["adminLoggedIn"] = false;

 

if($_SESSION["adminLoggedIn"] == true){
	$redirect = "/administrator-interface.php";
	closeConnection($auxConnection);

}
else {
	$redirect = "/index.php";
	closeConnection($auxConnection);
}


header('location:'.$redirect);




?>