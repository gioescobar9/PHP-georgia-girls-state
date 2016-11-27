<?php
session_start();
require_once 'connectAuxDB.php';

$auxConnection=connectAuxDB();

//retrieve the username and password from the user logging in
$username = $_POST["username"];
$password = $_POST["password"];

//currently no one is logged in
$isStudent = false;
$isSchool = false;
$missmatch = false;

///check to see if a school or student is logging in based off of the first characters
if (preg_match('/Stu/',$password)){
    $isStudent = true;
}
else if(preg_match('/Sch/',$password))
    $isSchool = true;
else{
    $missmatch = true;
    $redirect = "../index.php";
    $_SESSION["loggedIn"] = false;
}

//query based off of the login type
if($missmatch == false){
        if($isStudent == true)
    $query = "SELECT * FROM student WHERE studentEmail='$username' AND studentPassword='$password';";
else if($isSchool == true){
    $query = "SELECT * FROM school WHERE schoolEmail='$username' AND schoolPassword='$password';";
}
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);

if($result->num_rows>0)
    $_SESSION["loggedIn"] = true;
else
    $_SESSION["loggedIn"] = false;

//need to check if cookie name is school or student on the aux-information page
//determine if the person is a student or school
if($_SESSION["loggedIn"] == true){
    if($isSchool == true){
        $record = $result->fetch_assoc();
        $redirect="../school-interface.php";
        $_SESSION["schoolLoggedIn"] = true;
        setcookie("schoolID",$record['schoolID'], time() + 86400, "/");
        closeConnection($auxConnection);  
    }
}
if($_SESSION["loggedIn"] == true){
    if($isStudent == true){
        $record = $result->fetch_assoc();
	   $redirect = "../student-interface.php";
	   closeConnection($auxConnection);
        $_SESSION["studentLoggedIn"] = true;
       setcookie("studentID",$record['studentID'], time() + 86400, "/");
        closeConnection($auxConnection);
    }
}
else{
    $redirect="../index.php";
    closeConnection($auxConnection);
}

    }

header('location:'.$redirect);
