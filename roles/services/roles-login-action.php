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
else if($isSchool == true)
    $query = "SELECT * FROM school WHERE schoolEmail='$username' AND password='$password';";

$result = $auxConnection->query($query);
if(!$result) die ("query failed".$auxConnection->error);

if($result->num_rows>0)
    $_SESSION["loggedIn"] = true;
else
    $_SESSION["loggedIn"] = false;

//need to check if cookie name is school or student on the aux-information page
if($_SESSION["loggedIn"] == true){
    if($isSchool == true){
        $redirect="../school-interface.php";
        //setcookie("user",'school', time() + 86400, "/");
        closeConnection($auxConnection);  
    }
}
if($_SESSION["loggedIn"] == true){
    if($isStudent == true){
	   $redirect = "../student-interface.php";
	   closeConnection($auxConnection);
       //setcookie("user",'student', time() + 86400, "/");
    }
}
else{
    $redirect="../index.php";
    closeConnection($auxConnection);
}

    }

header('location:'.$redirect);
