<?php
session_start();
require_once 'auxiliaryConnectDB.php';

$auxConnection = connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];

// we check and see if the user name and password is accurate...we set a redirect page for either case

$query = "SELECT * FROM auxiliary WHERE unitNumber = '$username' AND password = '$password';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);
if($result->num_rows > 0)
	$_SESSION["loggedIn"] = true;
else
	$_SESSION["loggedIn"] = false;

 

if($_SESSION["loggedIn"] == true){
	$redirect = "../auxiliary-main-interface.php";
	closeConnection($auxConnection);

	$record = $result->fetch_assoc();
	setcookie("unitNumber",$username, time() + 86400, "/");
	setcookie("auxiliaryEmail", $record["auxEmail"], time() + 86400, "/");
	setcookie("auxiliaryID", $record["auxiliaryID"], time() + 86400, "/");
	
	// in the future this will be where i could set cookies....

}
else {
	$redirect = "../index.php";
	closeConnection($auxConnection);
}


header('location:'.$redirect);




?>