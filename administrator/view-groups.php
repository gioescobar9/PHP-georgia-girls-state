<?php
session_start();
if(!isset($_SESSION["adminLoggedIn"])){
  header('location: index.php');
}

require_once 'admin-connect-db.php';

$auxConnection = connectAuxDB();

function displayCityTable($city){
	$query = "SELECT * FROM student WHERE assignedCity = '$city';";
	$result = $auxConnection->query($query);
	if(!$result) die("query1 failed".$auxConnection->error);

	$rows = $result->num_rows;

	echo "<table class = 'table table-striped'>";
		echo "<thead>";
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
	
}


}
function getSchoolName($school_ID){

}

function getHomeTown($stud_ID){

}
?>