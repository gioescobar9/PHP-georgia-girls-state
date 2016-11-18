<?php 
session_start();
require_once 'auxiliaryConnectDB.php';
//we need to delte both the application and the student
$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: ../auxiliary-main-interface.php");
} 

//deletes the application from the application table
$auxConnection = connectAuxDB();
$query = "DELETE FROM applications WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);

//deletes the student from the student application
$query = "DELETE FROM student WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die("query2 failed".$auxConnection->error);

header('location:../auxiliary-main-interface.php');


?>