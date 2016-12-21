<?php
        
    session_start();
    require_once 'connectAuxDB.php';
        
    require_once 'php-functions.php';
    schoolLoggedIn();
     
    //get the schoolID for the upatde information
    $id = $COOKIE["schoolID"];

    $auxConnection=connectAuxDB();

    $schoolName = $_POST["schoolName"];
    $schoolEmail = $_POST["schoolEmail"];
    
    //update the schools info to the entered information
    $query = "UPDATE school SET schoolName ='$schoolName', schoolEmail='$schoolEmail' WHERE schoolID='$id'";
    $result = $auxConnection->query($query);
    if(!$result) die ("query failed".$auxConnection->error);
        
    echo "<script>alert('Your Information has been submitted')</script>";
    $redirect="../school-interface.php";
        
    //redirec the user to the home page    
    header('location:'.$redirect);
    
?>