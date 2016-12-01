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
	$query = "INSERT INTO school(schoolName, schoolEmail, schoolPassword) VALUES ('$schoolName', '$schoolEmail', '$schoolPassword');";
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
$auxiliaryID = $_COOKIE["auxiliaryID"];
$query = "INSERT INTO student(firstName ,lastName, studentEmail, schoolID, auxiliaryID, studentPassword) VALUES ('$studentFirstName', '$studentLastName', '$studentEmail', '$schoolID', '$auxiliaryID','$studentPassword');";
$result = $auxConnection->query($query);
if(!$result) die ("query4 failed".$auxConnection->error);


// next we create the application and give it empty string values for the info fields
$query = "INSERT INTO applications(auxInfo, schoolInfo, studentInfo, parentConsentInfo, auxiliaryID, schoolID, complete) VALUES ('', '', '', '', '$auxiliaryID', '$schoolID', 'FALSE');";
$result = $auxConnection->query($query);
if(!$result) die ("query5 failed".$auxConnection->error);
?>

<script type="text/javascript">

// email service
var nodemailer = require('nodemailer');
var smtpTransport = nodemailer.createTransport("SMTP", {
	service: "Gmail",
	auth: {
		user: "gmail.user@gmail.com",
		pass: "userpass"
	}
});

var mailOptions: {
	from: "American Legion Auxillary <americanlegion@gmail.com",
	to: "$studentEmail",
	subject: "Login to ALA",
	text: "",
	html: ""
}

smtpTransport.sendMail(mailOptions, function(error, response)
{
	if(error){
		console.log(error);
	}
	else{
		console.log("Message sent: " + response.message);
	}

	smtpTransport.close();
})

</script>

<?php>

header('location: ../auxiliary-application-form.php');





?>