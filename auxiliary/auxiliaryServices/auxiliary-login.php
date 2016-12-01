<?php
session_start();
require_once 'auxiliaryConnectDB.php';

$auxConnection = connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];

$isAuxiliary = false;
$isAdministrator = false;


// we check and see if the user name and password is accurate...we set a redirect page for either case

$query = "SELECT * FROM auxiliary WHERE unitNumber = '$username' AND BINARY password = BINARY '$password';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);
if($result->num_rows > 0){

    if($username == '000'){
        if($password == 'adminpass123'){
            $isAdministrator = true;
        }
        else {
            $redirect = "../index.php";
        }
    }   
    
    else
        $isAuxiliary = true;
}
else{
    $redirect = '../index.php';
    $_SESSION['adminLoggedIn'] = false;
}
 
if($isAdministrator == true){
    $_SESSION["adminLoggedIn"] = true;
    $redirect = "../../administrator/administrator-interface.php";
    closeConnection($auxConnection);
}

else if($isAuxiliary == true){
    $_SESSION["loggedIn"] = true;
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