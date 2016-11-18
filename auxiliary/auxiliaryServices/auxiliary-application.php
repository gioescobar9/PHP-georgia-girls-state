<?php
session_start();
require_once 'auxiliaryConnectDB.php';
//this is not working

$auxConnection = connectAuxDB();
$appID = $_POST["appID"];
$post_data = array(
	'unitNumber' => $_POST['unitNumber'],
	'unitCounty' => $_POST['unitCounty'],
	'unitAddress' => $_POST['unitAddress'],
	'unitCity' => $_POST['unitCity'],
	'unitEmail' => $_POST['unitEmail'],
	'unitPhone' => $_POST['unitPhone'], 
	'officialFirstName' => $_POST['officialFirstName'],
	'officialLastName' => $_POST['officialLastName'],
	'officialEmail' => $_POST['officialEmail']
);

//convert the post_data associative array into a string in order to send it to the database
$toInsert = implode(',',array_map(
	function($v,$k){
		if(is_array($v)){
			return $k.'[]='.implode('&'.$k.'[]=', $v);
		}else{
			return $k.'='.$v;
		}
	},
	$post_data,
	array_keys($post_data)
	));
//send our application data to the database and set its status as complete
$query = "UPDATE applications SET auxInfo = '$toInsert', auxInfoComplete = '1' WHERE applicationID = '$appID';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);

/*
now that we have submitted this applcation info we need to check if all other forms are now compete in order to update the complete field letting us know that all other applications have been submitted
*/

$query = "SELECT auxInfoComplete,schoolInfoComplete, studentInfoComplete, parentConsentInfoComplete FROM applications WHERE applicationID = '$appID';";
$result = $auxConnection->query($query);
if(!$result) die ("query2 failed".$auxConnection->error);
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	if($record['auxInfoComplete'] == TRUE && $record['schoolInfoComplete'] == TRUE && $record['studentInfoComplete'] == TRUE && $record['parentConsentInfoComplete'] == TRUE){
	$query = "UPDATE applications SET complete = '1' WHERE applicationID = '$appID';";
	$result = $auxConnection->query($query);
	if(!$result) die ("query3 failed".$auxConnection->error);
}

}

header('location: ../auxiliary-main-interface.php');

?>