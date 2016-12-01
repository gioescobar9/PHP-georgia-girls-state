<?php
session_start();
if(!isset($_SESSION["adminLoggedIn"])){
  header('location: index.php');
}

require_once 'auxiliaryConnectDB.php';


function displayCityTable($city){
	$auxConnection = connectAuxDB();
	$query = "SELECT * FROM student WHERE assignedCity = '$city';";
	$result = $auxConnection->query($query);
	if(!$result) die("query1 failed".$auxConnection->error);

if($result->num_rows > 0){
	$rows = $result->num_rows;

	echo "<table class = 'table table-striped'>";
		echo "<thead>";
		echo "<tr>
				<th style = 'text-align:center;' colspan = '4'><h4>".$city."</h4></th>
			</tr>";
			echo "<tr>";
				echo "<th>Student Name</th>";
				echo "<th>Student Email</th>";
				echo "<th>HomeTown</th>";
				echo "<th>School</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
	$result->data_seek($i);
	$record = $result->fetch_array(MYSQLI_ASSOC);
	
	$studName = $record["firstName"]." ".$record["lastName"];
	$studEmail = $record["studentEmail"];
	$studID = $record["studentID"];
	$hometown = getHomeTown($studID);
	$schoolID = $record["schoolID"];
	$school = getSchoolName($schoolID);

	echo "<tr>";
  		echo "<td> $studName</td>";
  		echo "<td> $studEmail</td>";
		echo "<td> $hometown</td>";
		echo "<td> $school</td>";
	echo "</tr>";

	echo "</tbody>";
echo "</table>";

}
	
 closeConnection($auxConnection);
	
}


}
function getSchoolName($school_ID){
	$toReturn = "";
	$auxConnection = connectAuxDB();

	$query = "SELECT schoolName FROM school WHERE schoolID = '$school_ID';";
	$result = $auxConnection->query($query);
	if(!$result) die("school query failed".$auxConnection->error);
	$record = $result->fetch_assoc();
	$toReturn = $record["schoolName"];
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

$toReturn = $studentInfo['studentCity'];
closeConnection($auxConnection);
return $toReturn;

}
?>

<html>
    <head>
        <title>Admin</title>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="administratorStyleSheet.css">
    </head>
	<body>
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="../roles/images/icon.jpg">
            <a href = "administrator-logout.php"><span style = "float: right; margin-left: -20%; font-size:20px;" class = "btn 
                btn-primary">logout</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        <div class="logoImage"></div>
        </div>

        <div class = "container">
        <h3>Gwinnett County</h3>
        <?php displayCityTable("Harris") ?>

             
        <?php displayCityTable("Houston") ?>

              
        <?php displayCityTable("Telfair") ?>

        <h3>Hall County</h3>
        <?php displayCityTable("Emanuel") ?>

        
        <?php displayCityTable("Irwin") ?>

        
        <?php displayCityTable("Jackson") ?>

        <h3>Liberty County</h3>
        <?php displayCityTable("George") ?>

        
        <?php displayCityTable("Grady") ?>

        
        <?php displayCityTable("Lanier") ?>

        <h3>Walton County</h3>
        <?php displayCityTable("Baldwin") ?>

        
        <?php displayCityTable("Mitchell") ?>

        
        <?php displayCityTable("Tatnall") ?>
       </div> <!-- closes container -->

    </body>
</html>
