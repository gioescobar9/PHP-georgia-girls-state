<?php
session_start();
require_once 'connectAuxDB.php';

$auxConnection=connectAuxDB();

$username = $_POST["username"];
$password = $_POST["password"];

$studentPassword = 'stu';
$schoolPassword = 'sch';

$isStudent = false;
$isSchool = false;
$missmatch = false;

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

if($missmatch == false){
        if($isStudent == true)
    $query = "SELECT * FROM student WHERE studentEmail='$username' AND password='$password';";
else if($isSchool == true){
    $query = "SELECT * FROM school WHERE schoolEmail='$username' AND password='$password';";
}
$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);

if($result->num_rows>0)
    $_SESSION["loggedIn"] = true;
else
    $_SESSION["loggedIn"] = false;

//need to check if cookie name is school or student on the aux-information page
if($_SESSION["loggedIn"] == true){
    if($isSchool == true){
        $record = $result->fetch_assoc();
        $redirect="../school-interface.php";
        $_SESSION["schoolLoggedIn"] = true;
        setcookie("schoolID",$record['schoolID'], time() + 86400, "/");
        /*$query2 = "SELECT schoolID FROM student WHERE studentID="$record['schoolID']"";
        $result2 = $auxConnection->query($query2);
        if(!$result2) die ("query failed".$auxConnection->error);
        $record2 = $result->fetch_assoc();
        setcookie("studentID", $record['schoolID'], time(), 86400, "/");*/
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
