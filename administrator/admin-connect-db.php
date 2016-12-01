
<?php
function connectAuxDB(){
	$db = "georgiagirlsstate";
	$user = "root";
	$pwd = "";
	$server = "localhost";

	$connection = new mysqli($server, $user, $pwd, $db);
	if($connection->connect_error){
		die("unable to connect to database". $connection->connect_error);
	}
	
	return $connection;

}

function closeConnection($connection){
	$connection->close();
}
?>