<?php
session_start();

//~~~~~~~~~REMEMEBER TO RUN A QUERY TO CHECK IF ALL APPLICATIONS HAVE BEEN COMPLETE AFTER DOING THE UPDATE QUERY FOR THIS ONE

$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: ../auxiliary-main-interface.php");
}

require_once 'auxiliaryConnectDB.php';
$auxConnection= auxiliaryConnectDB();

$query = "SELECT auxInfo, auxInfoComplete FROM applications WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	if($record['auxInfoComplete'] == true)
	$data_string = 	
}

?>
