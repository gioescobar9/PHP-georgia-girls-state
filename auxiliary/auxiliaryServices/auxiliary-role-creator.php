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


//retrieve auxiliary email, so we can use it with the email service
$query = "SELECT auxEmail FROM auxiliary WHERE auxiliaryID = '$auxiliaryID';";
$result = $auxConnection->query($query);
if(!$result) die("query 8 failed".$auxConnection->error);
$record = $result->fetch_assoc();
$auxEmail = $record['auxEmail'];

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

	//existing school email service
	$to = $schoolEmail;

	$subject = 'New Georgia Girls State Application';

	$message = 'This email has been sent to you in order to inform you that a you have a new pending application,\n
	please follow the following link to complete new applcations: http://pisforpizza.com/ggs/roles/ ';
	$message = wordwrap($message, 70);

	$headers = "From: American Legion Auxiliary<".$auxEmail.">\r\n";
	$headers = "Reply-To: ".$auxEmail."\r\n";

	mail($to, $subject, $message, $headers);

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

	// new school email service
	$to = $schoolEmail;

	$subject = 'Georgia Girls State Application';

	$message = 'Your account has been successfully created!\n
	Please complete your part of the application by clicking on the following link and using the credentials below that have been provided for you. \n Link to Application: http://pisforpizza.com/ggs/roles/ \n
	Username: '.$schoolEmail.'\n
	Password:'.$schoolPassword.'';

	$message = wordwrap($message,70);

	$headers = "From: American Legion Auxiliary<".$auxEmail.">\r\n";
	$headers = "Reply-To: ".$auxEmail."\r\n";

	mail($to, $subject, $message, $headers);
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

//student email service first 
$to = $studentEmail;

$subject = 'Georgia Girls State Application';

$message = 'Your account has been successfully created!\n
Please complete your part of the application by clicking on the following link and using the credentials below that have been provided to you. \n Link to Application: http://pisforpizza.com/ggs/roles/ \n  
	Username:'.$studentEmail.'\n
	Password:'.$studentPassword.'';
$message = wordwrap($message,70);

$headers = "From: American Legion Auxiliary<".$auxEmail.">\r\n";
$header = "Reply-To: ".$auxEmail."\r\n";

mail($to, $subject, $message, $headers);



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



closeConnection($auxConnection);
header('location: ../auxiliary-application-form.php?id='.$appID);



?>