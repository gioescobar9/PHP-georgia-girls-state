<?php
require_once 'auxiliaryConnectDB.php';

function createCrudTable(){
	$auxConnection = connectAuxDB();

$auxID = $_COOKIE["auxiliaryID"];
$query = "SELECT * FROM student WHERE auxiliaryID = '$auxID';";

$result = $auxConnection->query($query);
if(!$result) die("query failed ".$auxConnection->error);

$rows = $result->num_rows;

echo "<div class='container'>";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Student Name</th>";
				echo "<th>Status</th>";
				echo "<th>Options</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
  $result->data_seek($i);
  $record = $result->fetch_array(MYSQLI_ASSOC);
 $studID = $record["studentID"];
 $studName = $record["firstName"]." ".$record["lastName"];
 $status = getStatus($studID);
 if($status == "Incomplete")
  $statusRow = "<td class = 'alert alert-warning'>".$status."</td>";
else
  $statusRow = "<td class = 'alert alert-success'>".$status."</td>";
 echo "<tr>";
  echo "<td> $studID </td>";
  echo "<td> $studName </td>";
  echo $statusRow;
  echo "<td> <a class = 'btn' href = 'auxiliaryServices/crud-view.php?id=".$studID."'><span class='glyphicon glyphicon-file'></span>View</a>
  <a class = 'btn' href = 'auxiliaryServices/crud-update.php?id=".$studID."'><span class='glyphicon glyphicon-edit'></span>Update</a>
  <a class = 'delete' href = 'auxiliaryServices/crud-delete.php?id=".$studID."'><span class='glyphicon glyphicon-minus-sign'></span>Delete</a> </td>";
 echo "</tr>";
}// end of for loop

		echo "</tbody>";
	echo "</table>";
echo "</div>";	

//jqery function to make sure the user wants to delete
echo "<script>
$('.delete').click(function(){return confirm('Are you sure you want to delete this application?');});
</script>";

closeConnection($auxConnection);
}// end of create table function


function getStatus($stud_ID){
  $auxConnection = connectAuxDB();

  $query = "SELECT auxInfoComplete,schoolInfoComplete, studentInfoComplete, parentConsentInfoComplete FROM applications WHERE studentID = '$stud_ID';";
$result = $auxConnection->query($query);
  if(!$result) die ("query3 failed".$auxConnection->error);

  if($result->num_rows > 0){
    $record = $result->fetch_assoc();
    if($record['auxInfoComplete'] == TRUE && $record['schoolInfoComplete'] == TRUE && $record['studentInfoComplete'] == TRUE && $record['parentConsentInfoComplete'] == TRUE){
    $query = "UPDATE applications SET complete = '1' WHERE studentID = '$stud_ID';";
    $result = $auxConnection->query($query);
    if(!$result) die ("query4 failed".$auxConnection->error);
    }

  }

  $query = "SELECT complete FROM applications WHERE studentID = '$stud_ID';";
  $result = $auxConnection->query($query);
  if(!$result) die("getStatus query failed".$auxConnection->error);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["complete"] == 0)
      $toReturn = "Incomplete";
    else
      $toReturn = "Complete";
  }
  else
    $toReturn = "0 results";
closeConnection($auxConnection);
return $toReturn; 

}

function createStudentCrudTable(){
	$auxConnection = connectAuxDB();

$auxID = $_COOKIE["auxiliaryID"];
//$unitNumber = $_COOKIE["unitNumber"];
$query = "SELECT * FROM student WHERE auxiliaryID = '$auxID';";

$result = $auxConnection->query($query);
if(!$result) die("query failed ".$auxConnection->error);

$rows = $result->num_rows;

echo "<div class='container'>";
    echo "<legend>Student Credentials</legend>";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Student Name</th>";
                echo "<th> Student Email</th>";
				echo "<th>Password</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
  $result->data_seek($i);
  $record = $result->fetch_array(MYSQLI_ASSOC);
 $studID = $record["studentID"];
 $studName = $record["firstName"]." ".$record["lastName"];
 $studEmail = $record["studentEmail"];
 $password = $record["studentPassword"];
 echo "<tr>";
  echo "<td> $studID </td>";
  echo "<td> $studName </td>";
  echo "<td> $studEmail</td>";
  echo "<td> $password</td>";
 echo "</tr>";
}// end of for loop

		echo "</tbody>";
	echo "</table>";
echo "</div>";	

closeConnection($auxConnection);
}// end of for loop

function createSchoolCrudTable(){
	$auxConnection = connectAuxDB();
//$auxID = $_COOKIE["auxiliaryID"]; unsure what to query on here
$unitNumber = $_COOKIE["unitNumber"];
$query = "SELECT * FROM school WHERE auxiliaryID = '$unitNumber';";

$result = $auxConnection->query($query);
if(!$result) die("query failed ".$auxConnection->error);

$rows = $result->num_rows;

echo "<div class='container'>";
    echo "<legend>School Credentials</legend>";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>School Name</th>";
                echo "<th>School Email</th>";
				echo "<th>Password</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
  $result->data_seek($i);
  $record = $result->fetch_array(MYSQLI_ASSOC);
 $schoolID = $record["schoolID"];
 $schoolName = $record["schoolName"];
 $schoolEmail = $record["schoolEmail"];   
 $schPassword = $record["schoolPassword"];
 echo "<tr>";
  echo "<td> $schoolID </td>";
  echo "<td> $schoolName </td>";
  echo "<td> $schoolEmail </td>";
  echo "<td> $schPassword</td>";
 echo "</tr>";
}// end of for loop

		echo "</tbody>";
	echo "</table>";
echo "</div>";
}
?>
