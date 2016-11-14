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
 $appID = $record["applicationID"];
 $studName = $record["firstName"]." ".$record["lastName"];
 $status = getStatus($appID);
 echo "<tr>";
  echo "<td> $appID </td>";
  echo "<td> $studName </td>";
  echo "<td> $status </td>";
  echo "<td> <a class = 'btn'><span class='glyphicon glyphicon-file'></span>View</a>
  <a class = 'btn'><span class='glyphicon glyphicon-edit'></span>Update</a>
  <a href = 'http://google.com'><span class='glyphicon glyphicon-minus-sign'></span>Delete</a> </td>";
 echo "<tr>";
}

		echo "</tbody>";
	echo "</table>";
echo "</div>";	

closeConnection($auxConnection);
}// end of create table function


function getStatus($app_ID){
  $auxConnection = connectAuxDB();
  $query = "SELECT complete FROM applications WHERE applicationID = '$app_ID';";
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
?>