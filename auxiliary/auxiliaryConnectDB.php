<?
function connectAuxDB(){
	$db = "georgiagirlsstate";
	$user = "root";
	$pwd = "";
	$server = "localhost";

	$connection = new mysql_connect($server, $user, $pwd, $db);
	if(!$connection){
		die("unable to connect to database". mysql_error());
	}
	echo "Connected successfully";
	return $connection;

}

function closeConnection($connection){
	mysql_close($connection);
}