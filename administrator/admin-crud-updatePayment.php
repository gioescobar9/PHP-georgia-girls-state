<?php
session_start();
require_once 'admin-connect-db.php';

//retrieve studentID
$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: administrator-interface.php");
} 

$auxConnection = connectAuxDB();

$query = "UPDATE applications set paymentStatus = '1' WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);


header('location: administrator-interface.php');

?>