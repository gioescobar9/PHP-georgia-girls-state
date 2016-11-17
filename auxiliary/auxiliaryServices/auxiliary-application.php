<?php
session_start();
require_once 'auxiliaryConnectDB.php';
/*
$id = null;
if(!empty($_GET['id'])){
	$id = $_REQUEST['id'];
}
if($id == null){
	header("location: ../auxiliary-main-interface.php");
}
*/

echo $_POST["appID"];
$auxConnection = connectAuxDB();
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

echo "it worked";



?>