<?php
        
    session_start();
    require_once 'connectAuxDB.php';
        
    if(!isset($_SESSION["loggedIn"])){
        header('location: index.php');
    }
        
    if(!isset($_SESSION["schoolLoggedIn"])){
        header('location: index.php');
    }
        
        
    if(!empty($_GET['id'])){
        $id = $_REQUEST['id'];
    }
        
    if($id == null){
         header("location: ../school-interface.php");
    }

    $auxConnection=connectAuxDB();

    $schoolName = $_POST["schoolName"];
    $schoolEmail = $_POST["schoolEmail"];
    
    $query = "UPDATE school SET schoolName ='$schoolName', schoolEmail='$schoolEmail' WHERE schoolID='$id'";
    $result = $auxConnection->query($query);
    if(!$result) die ("query failed".$auxConnection->error);
        
    echo "<script>alert('Your Information has been submitted')</script>";
    $redirect="../school-interface.php";
        
    //header('location:'.$redirect);
        
    header( "refresh:1;url='$redirect'" );
    
?>