<?php
session_start();
require_once 'auxiliaryConnectDB.php';
// checks if the id was passed when the view link was clicked
$studID = null;
if(!empty($_GET['id'])){
    $studID = $_REQUEST['id'];
}
if($studID == null){
    header("location: ../auxiliary-main-interface.php");
}

$auxConnection = connectAuxDB();

//retrieve auxiliary info
$query = "SELECT auxInfo, auxInfoComplete FROM applications WHERE studentID = '$studID';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	$auxInfoString = $record['auxInfo'];
	if($record['auxInfoComplete'] == 1)
		$auxInfoStatus = true;
	else
		$auxInfoStatus = false;

	if($auxInfoStatus == true){
		$partial = explode(',', $auxInfoString);
		$auxInfo = array();
		array_walk($partial, function($val,$key) use(&$auxInfo){
			list($key, $value)= explode('=',$val);
			$auxInfo[$key] = $value;
		});	

	}	
}// end of retrieving aux info: $auxInfo and $auxInfoStatus


//retrieve school info
$query = "SELECT schoolInfo, schoolInfoComplete FROM applications WHERE studentID = '$studID';";
$result = $auxConnection->query($query);
if(!$result) die ("query2 failed".$auxConnection->error);
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	$schoolInfoString = $record['schoolInfo'];
	if($record['schoolInfoComplete'] == 1)
		$schoolInfoStatus = true;
	else
		$schoolInfoStatus = false;

	if($schoolInfoStatus == true){
		// make associative array
		$partial = explode("^",$schoolInfoString);
		$stringInfo = "";
		$schoolInfo = array();
		$asscSchool = array();
		$i = 1;
		$count = count($partial);

		foreach($partial as $values){
			$stringInfo = $values;
			if($i < $count){
				$newStringInfo = explode(":", $stringInfo);
				$asscSchool = array("$newStringInfo[0]"=>"$newStringInfo[1]");
			}
			$i++;
			$schoolInfo = array_merge($item, $asscSchool);
		}

	}
}// end of retrieving school info: $schoolInfo and $schoolInfoStatus


//retrieve student info
$query = "SELECT studentInfo, studentInfoComplete FROM applications WHERE studentID = '$studID';";
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
		$partial = explode("^",$schoolInfoString);
		$stringInfo = "";
		$studentInfo = array();
		$asscSchool = array();
		$i = 1;
		$count = count($partial);

		foreach($partial as $values){
			$stringInfo = $values;
			if($i < $count){
				$newStringInfo = explode(":", $stringInfo);
				$asscSchool = array("$newStringInfo[0]"=>"$newStringInfo[1]");
			}
			$i++;
			$studentInfo = array_merge($item, $asscSchool);
		}
	}

}// end of retreiving student info: $studentInfo and $studentInfoStatus

//retrieve all parent consent info

?>