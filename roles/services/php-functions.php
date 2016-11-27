<?php
//use this page to hold repeated php functions
function studentLoggedIn(){
    if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
    if(!isset($_SESSION["studentLoggedIn"])){
            header('location: index.php');
        }
     
}

function schoolLoggedIn(){
    if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
    if(!isset($_SESSION["schoolLoggedIn"])){
            header('location: index.php');
        }
}


function getStatus($studID){
  $auxConnection = connectAuxDB();
  $query = "SELECT schoolInfoComplete FROM applications WHERE studentID = '$studID';";
  $result = $auxConnection->query($query);
  if(!$result) die("getStatus query failed".$auxConnection->error);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["schoolInfoComplete"] == 0 )
      $toReturn = "Incomplete";
    else
      $toReturn = "Complete";
  }
  else
    $toReturn = "0 results";

closeConnection($auxConnection);
return $toReturn; 

}

function getAppStatus($studID){
  $auxConnection = connectAuxDB();
  $query = "SELECT studentInfoComplete FROM applications WHERE studentID = '$studID';";
  $result = $auxConnection->query($query);
  if(!$result) die("getStatus query failed".$auxConnection->error);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["studentInfoComplete"] == 0 )
      $toReturn = "Incomplete";
    else
      $toReturn = "Complete";
  }
  else
    $toReturn = "0 results";

closeConnection($auxConnection);
return $toReturn; 

}

function getConsentStatus($studID){
  $auxConnection = connectAuxDB();
  $query = "SELECT parentConsentInfoComplete FROM applications WHERE studentID = '$studID';";
  $result = $auxConnection->query($query);
  if(!$result) die("getStatus query failed".$auxConnection->error);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["parentConsentInfoComplete"] == 0 )
      $toReturn = "Incomplete";
    else
      $toReturn = "Complete";
  }
  else
    $toReturn = "0 results";

closeConnection($auxConnection);
return $toReturn; 

}
?>