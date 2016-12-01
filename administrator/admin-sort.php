<?php
session_start();
require_once 'auxiliaryConnectDB.php';

$auxConnection = connectAuxDB();

$studArray = array();


$query = "SELECT studentID FROM student;";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);

$rows = $result->num_rows;

for($i = 0;$i<$rows;$i++){
	$result->data_seek($i);
	$record = $result->fetch_array(MYSQLI_ASSOC);
	updateCity($record["studentID"]);
}

function updateCity($studID){
	$auxConnection = connectAuxDB();
	$index = "assignedCity-".$studID;
	$value = $_POST[$index];
	$query = "UPDATE student SET assignedCity = '$value' WHERE studentID = '$studID';";
	$result = $auxConnection->query($query);
	if(!$result) die ("query2 failed".$auxConnection->error);

	closeConnection($auxConnection);
}

closeConnection($auxConnection);

header("location: administrator-interface.php");
?>