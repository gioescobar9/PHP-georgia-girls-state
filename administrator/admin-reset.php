<?php
session_start();
require_once 'auxiliaryConnectDB.php';

$axuConnection = connectAuxDB();

//first we will delete all application from the application table

$query = "TRUNCATE TABLE applications;";
$result = $axuConnection->query($query);
if(!$result) die("query1 failed".$axuConnection->error);

$query = "TRUNCATE TABLE student;";
$result = $axuConnection->query($query);
if(!$result) die("query2 failed".$axuConnection->error);

header('location: administrator-interface.php');
?>