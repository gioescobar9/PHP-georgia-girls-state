<?php
require_once 'admin-connect-db.php';

function createSortTable(){
	$auxConnection = connectAuxDB();	

	$query = "SELECT * FROM student ORDER BY auxiliaryID , lastName ;";
	$result = $auxConnection->query($query);
	if(!$result) die ("query1 failed".$auxConnection->error);

	$rows = $result->num_rows;
echo "<form method = 'post' action = 'admin-sort.php'>";
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
$studID = $record["studentID"];
$hometown = getHomeTown($studID);
$city = getCity($studID);
// need to add payment status and app status
echo "<tr>";
  echo "<td> $auxiliary</td>";
  echo "<td> $studName</td>";
echo "<td> $school</td>";
echo "<td> $hometown</td>";
echo "<td>
<div class = 'form-group'>
 <select class = 'form-control' name = 'assignedCity-".$studID."'>
        <option value = ''>not assigned</option>";
        if($city == "Harris")
        echo "<option selected = 'selected' value = 'Harris'>County: Gwinnett, City: Harris</option>";
        else echo "<option value = 'Harris'>County: Gwinnett, City: Harris</option>";
        if($city == "Houston")
        echo "<option selected = 'selected' value = 'Houston'>County: Gwinnett, City: Houston</option>";
        else echo "<option value = 'Houston'>County: Gwinnett, City: Houston</option>";
        if($city == "Telfair" )
          echo "<option selected = 'selected' value = 'Telfair'>County: Gwinnett, City: Telfair</option>";
        else echo "<option value = 'Telfair'>County: Gwinnett, City: Telfair</option>";
        if($city == "Emanuel")
          echo "<option selected = 'selected' value = 'Emanuel'>County: Hall, City: Emanuel</option>";
        else echo "<option value = 'Emanuel'>County: Hall, City: Emanuel</option>";
        if($city == "Irwin")
          echo "<option value = 'Irwin'>County: Hall, City: Irwin</option>";
        else echo "<option value = 'Irwin'>County: Hall, City: Irwin</option>";
        if($city == "Jackson")
          echo "<option selected = 'selected' value = 'Jackson'>County: Hall, City: Jackson</option>";
        else "<option value = 'Jackson'>County: Hall, City: Jackson</option>";
        if($city == "George")
          echo "<option selected = 'selected' value = 'George'>County: Liberty, City: George</option>";
        else echo "<option value = 'George'>County: Liberty, City: George</option>";
        if($city == "Grady")
          echo "<option selected = 'selected' value = 'Grady'>County: Liberty, City: Grady</option>";
        else echo "<option value = 'Grady'>County: Liberty, City: Grady</option>";
        if($city == "Lanier")
          echo "<option selected = 'selected' value = 'Lanier'>County: Liberty, City: Lanier</option>";
        else "<option value = 'Lanier'>County: Liberty, City: Lanier</option>";
        if($city == "Baldwin")
          echo "<option selected = 'selected' value = 'Baldwin'>County: Walton, City: Baldwin</option>";
        else "<option value = 'Baldwin'>County: Walton, City: Baldwin</option>";
        if($city == "Mitchell")
          echo "<option selected = 'selected' value = 'Mitchell'>County: Walton, City: Mitchell</option>";
        else echo "<option value = 'Mitchell'>County: Walton, City: Mitchell</option>";
        if($city == "Tatnall")
          echo "<option selected = 'selected' value = 'Tatnall'>County: Walton, City: Tatnal</option>";
        else echo "<option value = 'Tatnall'>County: Walton, City: Tatnal</option>";
echo "</select>
  </div>
        </td>" ;
  echo "</tr>";
	}// end for loop

    echo "</tbody>";
  echo "</table>";
  echo "<div class='buttonStudent'>
          <input type = 'submit' class = 'buttonSubmit' 
            value = 'Assign City'>
        </div>";
  echo "</form>";

  echo "<div class='buttonStudent'>
  <a href = 'view-groups.php' class = 'buttonSubmit'>View Groups</a>
        </div>";

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

function getCity($stud_ID){
$auxConnection = connectAuxDB();
$toReturn = '';
$query = "SELECT assignedCity FROM student WHERE studentID = '$stud_ID';";
$result = $auxConnection->query($query);
if(!$result) die("getCity query failed".$auxConnection->error);
$record = $result->fetch_assoc();
$toReturn = $record['assignedCity'];
closeConnection($auxConnection);
return $toReturn;
}

function getHomeTown($stud_ID){
  $toReturn = "";
  $auxConnection = connectAuxDB();
  //retrieve student info
$query = "SELECT studentInfo, studentInfoComplete FROM applications WHERE studentID = '$stud_ID';";
$result = $auxConnection->query($query);
if(!$result) die ("query3 failed".$auxConnection->error);
if($result->num_rows > 0){
  $record = $result->fetch_assoc();

    $studentInfoString = $record['studentInfo'];

  if($record['studentInfoComplete'] == 1)
    $studentInfoStatus = true;
  else 
    $studentInfoStatus = false;

  if($studentInfoStatus == true){
    // make associative array
    $partial = explode("^",$studentInfoString);
    $stringInfo = "";
    $studentInfo = array();
    $asscStudent = array();
    $i = 1;
    $count = count($partial);

    foreach($partial as $values){
      $stringInfo = $values;
      if($i < $count){
        $newStringInfo = explode(":", $stringInfo);
        $asscStudent = array("$newStringInfo[0]"=>"$newStringInfo[1]");
      }
      $i++;
      $studentInfo = array_merge($studentInfo, $asscStudent);
    }
        
  }

}// end of retreiving student info: $studentInfo and $studentInfoStatus
if(isset($studentInfo['studentCity']))
  $toReturn = $studentInfo['studentCity'];
else
  $toReturn = "-";

closeConnection($auxConnection);
return $toReturn;

}// end of function


?>