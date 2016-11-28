<?php
require_once 'auxiliaryConnectDB.php';

function createSortTable(){
	$auxConnection = connectAuxDB();	

	$query = "SELECT * FROM student ORDER BY auxiliaryID , lastName ;";
	$result = $auxConnection->query($query);
	if(!$result) die ("query1 failed".$auxConnection->error);

	$rows = $result->num_rows;

echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Auxiliary</th>";
				echo "<th>Student Name</th>";
				echo "<th>School</th>";
				echo "<th>Hometown</th>";
				echo "<th>Add to City</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
    for($i = 0;$i<$rows;$i++){
$result->data_seek($i);
$record = $result->fetch_array(MYSQLI_ASSOC);
$auxiliary = $record["auxiliaryID"];
$studName = $record["lastName"]." ".$record["firstName"];
$school = $record["schoolID"];
$hometown = "Milledgeville";
// need to add payment status and app status
echo "<tr>";
  echo "<td> $auxiliary</td>";
  echo "<td> $studName</td>";
echo "<td> $school</td>";
echo "<td> $hometown</td>";
echo "<td><div class='dropdown'>
    <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Add To City
    <span class='caret'></span></button>
    <ul class='dropdown-menu'>
      <li><a href='#''>Houston</a></li>
      <li><a href='#''>Harris</a></li>
      <li><a href='#''>Telfair</a></li>
    </ul>
  </div></td>" ;
  echo "</tr>";
	}// end for loop

}// end func

function getPayStatus($stud_ID){
	$auxConnection = connectAuxDB();

	$query = "SELECT paymentStatus FROM applications WHERE studentID = '$stud_ID';";
	$result = $auxConnection->query($query);
	if(!$result) die("query1 failed".$auxConnection->error);

	if($result->num_rows > 0){
		$row =  $result->fetch_assoc();
		if($row['paymentStatus'] == 0)
			$toReturn = "Not Paid";
		else
			$toReturn = "Paid";
	}
	else $toReturn = "0 results";
	closeConnection($auxConnection);
	return $toReturn;
}


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


?>