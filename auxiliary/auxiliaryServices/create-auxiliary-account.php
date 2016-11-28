<?php 
session_start();
require_once 'auxiliaryConnectDB.php';

$auxConnection = connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];


// here we may do a query to check and see if there already exist an auxiliary that has an account
$query = "SELECT * FROM auxiliary WHERE unitNumber = '$username';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);
if($result->num_rows > 0)
	$_SESSION["auxExist"] = true;
else
	$_SESSION["auxExist"] = false;




if($_SESSION["auxExist"] == false){
	$query = "INSERT INTO auxiliary (unitNumber, password, auxEmail)
VALUES ('$username', '$password', '$email');";

$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);

echo<<<_END


<!DOCTYPE html>
<html>
<head>
    <title>Acccount Created</title>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</head>
<body>
<div class = 'alert alert-info'>
<strong>Account Created</strong> Please proceed to the login page
</div>
<br>
<button class = 'btn btn-success'><a href = '../index.php'>Login</a>
</button>
</body>
</html>



_END;

closeConnection($auxConnection);
}
else{
	closeConnection($auxConnection);
	header('location: ../create-auxiliary-account-form.php');
	

}




?>