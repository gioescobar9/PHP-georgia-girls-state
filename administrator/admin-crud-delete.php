<?php
session_start();
require_once 'auxiliaryConnectDB.php';
//retrieve student id for sql statement
$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: administrator-interface.php");
} 

//deletes the application from the application table
$auxConnection = connectAuxDB();
$query = "DELETE FROM applications WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);

//deletes the student from the student application
$query = "DELETE FROM student WHERE studentID = '$id';";
$result = $auxConnection->query($query);
if(!$result) die("query2".$auxConnection->error);

header('location: administrator-interface.php');

?>