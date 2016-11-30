<?php
session_start();
require_once 'auxiliaryConnectDB.php';

$auxConnection = connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];

$isAuxiliary = false;
$isAdministrator = false;

//$adminPassword= "27865@@Admin";
//$adminUsername = "000";
// we check and see if the user name and password is accurate...we set a redirect page for either case

$query = "SELECT * FROM auxiliary WHERE unitNumber = '$username' AND password = '$password';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);
if($result->num_rows > 0){
    if($username == '000'){
        if($password == "27865@@Admin"){
            $isAdministrator = true;
        }
    }
    
    else
        $isAuxiliary = true;
}
 
if($isAdministrator == true){
    $_SESSION["adminLoggedIn"] = true;
    $_SESSION["loggedIn"] = false;
    $redirect = "../../administrator/administrator-interface.php";
    closeConnection($auxConnection);
}

else if($isAuxiliary == true){
    $_SESSION["loggedIn"] = true;
    $_SESSION["adminLoggedIn"] = false;
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