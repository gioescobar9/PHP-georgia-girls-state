<?php
session_start();
require_once 'auxiliaryConnectDB.php';
require_once 'passwordGenerator.php';

$auxConnection = connectAuxDB();

$studentFirstName = $_POST["stuFirstName"];
$studentLastName =$_POST["stuLastName"];
$studentEmail = $_POST["stuEmail"];
$schoolName = $_POST["schName"];
$schoolEmail = $_POST["schEmail"];
$officialSignature = $_POST["officialSignature"];
$officialSignatureDate = $_POST["officialSignatureDate"];

/*
~~~~~~~~~~~~~~~~query key~~~~~~~~~~~~~~~~~~~~~~~~~~~
0.figure out if there exist a school account already made for 	this school
1. if there is not create a school account and retriece its id
	else 2. retrieve the school id for use with other query operations
3. insert a new student account 
4. insert a new application with empty string for thier applications
*/
$schoolID; 
$auxiliaryID = $_COOKIE["auxiliaryID"];

/*This purpose of this block is to retrieve the schoolID , if the school we are looking for does not exist then we create an account for it, and then we retreive its ID
*/
$query = "SELECT * FROM school WHERE  schoolName = '$schoolName' AND schoolEmail = '$schoolEmail';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);
//if a school account already exist then simply save the schoolID
//otherwise insert a new school into the table then retrieve the schoolID
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	$schoolID = $record["schoolID"];
}else{
	$schoolPassword = genSchoolPass($_COOKIE["unitNumber"]);
	$query = "INSERT INTO school(schoolName, schoolEmail, schoolPassword, auxiliaryID) VALUES ('$schoolName', '$schoolEmail', '$schoolPassword', '$auxiliaryID');";
	$result = $auxConnection->query($query);
	if(!$result) die("query2 failed".$auxConnection->error);

	//now that we have inserted the school , we can retrieve the ID. 
	$query = "SELECT schoolID FROM school WHERE schoolname = '$schoolName' AND schoolEmail = '$schoolEmail';";
	$result = $auxConnection->query($query);
	if(!$result) die("query3 failed".$auxConnection->error);
	$record = $result->fetch_assoc();
	$schoolID = $record["schoolID"];
}


// next we create a student account
$studentPassword = genStudentPass($_COOKIE["unitNumber"]);

$query = "INSERT INTO student(firstName ,lastName, studentEmail, schoolID, auxiliaryID, studentPassword,assignedCity) VALUES ('$studentFirstName', '$studentLastName', '$studentEmail', '$schoolID', '$auxiliaryID','$studentPassword', '');";
$result = $auxConnection->query($query);
if(!$result) die ("query4 failed".$auxConnection->error);

//we retrieve the studentID in order to tie this student to an application that we are about to create
$query = "SELECT studentID FROM student WHERE firstName = '$studentFirstName' AND lastName = '$studentLastName' AND studentEmail = '$studentEmail' AND schoolID = '$schoolID';";
$result = $auxConnection->query($query);
if(!$result) die("query5 failed".$auxConnection->error);
$record = $result->fetch_assoc();
$studentID = $record['studentID'];


// next we create the application and give it empty string values for the info fields
$query = "INSERT INTO applications(auxInfo, auxInfoComplete, schoolInfo, schoolInfoComplete, studentInfo, studentInfoComplete, parentConsentInfo, parentConsentInfoComplete, auxiliaryID, schoolID, studentID, complete, paymentStatus) VALUES ('','FALSE', '', 'FALSE', '','FALSE', '', 'FALSE', '$auxiliaryID', '$schoolID', '$studentID','FALSE', 'FALSE');";
$result = $auxConnection->query($query);
if(!$result) die ("query6 failed".$auxConnection->error);

//next we need to get the application id for the application we just made and send it on over to the next page
$query = "SELECT applicationID FROM applications WHERE auxiliaryID = '$auxiliaryID' AND schoolID = '$schoolID' AND studentID = '$studentID';";
$result = $auxConnection->query($query);
if(!$result) die("query7 failed".$auxConnection->error);
$record = $result->fetch_assoc();
$appID = $record['applicationID'];


// in the future the email service will go here


header('location: ../auxiliary-application-form.php?id='.$appID);





?>