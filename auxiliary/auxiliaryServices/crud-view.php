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
			$studentInfo = array_merge($item, $asscSchool);
		}
	}

}// end of retreiving student info: $studentInfo and $studentInfoStatus

//retrieve all parent consent info
$query = "SELECT parentConsentInfo, parentConsentInfoComplete FROM applications WHERE studentID = '$studID';";
$result = $auxConnection->query($query);
if(!$result) die("query4 failed".$auxConnection->error);
if($result->num_rows > 0){
	$record = $result->fetch_assoc();
	$parentConsentInfoString = $record['parentConsentInfo'];
	if($record['parentConsentInfoComplete'] == 1)
		$parentConsentInfoStatus = true;
	else
		$parentConsentInfoStatus = false;

	if($parentConsentInfoStatus == true){
		//make associative array
		$partial = explode("^", $parentConsentInfoString);
		$stringInfo = "";
		$parentConsentInfo = array();
		$asscParent = array();
		$i = 1;
		$count = count($partial);

		foreach($partial as $values){
			$stringInfo = $values;
			if($i < $count){
				$newStringInfo = explode(":", $stringInfo);
				$asscParent = array("$newStringInfo[0]"=>"$newStringInfo[1]");
			}
			$i++;
			$parentConsentInfo = array_merge($item, $asscParent);
		}
	}
}// end of retreiving parent consent info

?>

<!DOCTYPE html>
<html>
<head>
    <title>Auxiliary Application Information</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/auxiliaryStyleSheet.css">
    
</head>
<body>

<header>
    <div class="heading">
        <h1 class="loginHeader"><img src="../images/icon.jpg" alt = "logo"><a href = "../auxiliary-main-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-home"><br>Home</span></a>  
        <br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    </div>
</header>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#auxiliary">Auxiliary</a></li>
  <li><a data-toggle="tab" href="#school">School</a></li>
  <li><a data-toggle="tab" href="#student">Student</a></li>
  <li><a data-toggle="tab" href="#parent">Parent Consent</a></li>
</ul>

<div class="tab-content">
  <div id="auxiliary" class="tab-pane fade in active">
    <h3>Auxiliary Application</h3>
    <div class="container">
    <div class="well">

        <form class="form-horizontal" name = "application" 
        action = 'auxiliary-application.php' method = "post">

            <div class="form-group">
                <legend>Auxiliary Information</legend>
                <div class="col-md-6">
                <label for = "unitNumber">Unit Number:</label>
                <input type="text" class="form-control" id="unitNumber" autofocus name = "unitNumber"
                value = "<?php echo isset($auxInfo['unitNumber']) ? $auxInfo['unitNumber']:''; ?>" disabled required> 
            </div>
            <div class="col-md-6">
                <label for = "unitLocation">Unit Location:</label>
                <input type="text" class="form-control" id="unitLocation" maxlength="25" placeholder="Unit County" 
                name = "unitCounty" value = "<?php echo isset($auxInfo['unitCounty']) ? $auxInfo['unitCounty']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-12">
                <label for = "unitStreetAddress">Street Address:</label>
                <input type="text" class="form-control" id="unitStreetAddress" maxlength="30" name = "unitAddress" 
                 value = "<?php echo isset($auxInfo['unitAddress']) ? $auxInfo['unitAddress']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-4">
                <label for = "unitCity">City:</label>
                <input type="text" class="form-control" id="unitCity" maxlength="30" placeholder="City" name = "unitCity" value = "<?php echo isset($auxInfo['unitCity']) ? $auxInfo['unitCity']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-4">
                <label for = "unitState">State:</label>
                <input type="text" class="form-control" id="unitState" maxlength="30" placeholder="Georgia" name = "unitState" value = "<?php echo isset($auxInfo['unitState']) ? $auxInfo['unitState']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-4">
                <label for = "unitZip">ZipCode:</label>
                <input type="text" class="form-control" id="unitZip" maxlength="30" placeholder="" name = "unitZip" value = "<?php echo isset($auxInfo['unitZip']) ? $auxInfo['unitZip']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-6">
                <label for = "unitEmail">Email:</label>
                <input type="text" class="form-control" id="unitEmail" maxlength="50" placeholder="user@gmail.com" name = "unitEmail" value = "<?php echo isset($auxInfo['unitEmail']) ? $auxInfo['unitEmail']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-6">
                <label for = "unitPhone">Phone Number:</label>
                <input type="text" class="form-control" id="unitPhone" maxlength="15" placeholder="(555)888-0000" name = "unitPhone" value = "<?php echo isset($auxInfo['unitPhone']) ? $auxInfo['unitPhone']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-12">
                <legend>Auxiliary Sponsoring Official Information</legend>
            </div>
            <div class="col-md-6">
                <label for = "officialFirstName">First Name:</label>
                <input type="text" class="form-control" id="officialFirstName" maxlength="25" name = "officialFirstName" value = "<?php echo isset($auxInfo['officialFirstName']) ? $auxInfo['officialFirstName']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-6">
                <label for = "officialLastName">Last Name:</label>
                <input type="text" class="form-control" id="officialLastName" maxlength="25" name = "officialLastName" value = "<?php echo isset($auxInfo['officialLastName']) ? $auxInfo['officialLastName']:''; ?>" disabled required><br>

            </div>
            <div class="col-md-6">
                <label for = "officialEmail">Official's Email:</label>
                <input type="text" class="form-control" id="officialEmail" maxlength="25" placeholder="user@gmail.com" name = "officialEmail" value = "<?php echo isset($auxInfo['officialEmail']) ? $auxInfo['officialEmail']:''; ?>" disabled required><br>
            </div>
            <div class="col-md-6">
                <label for = "officialPhone">Official's Phone:</label>
                <input type="text" class="form-control" id="officialPhone" maxlength="15" placeholder="(555)888-0000" name = "officialPhone" value = "<?php echo isset($auxInfo['officialPhone']) ? $auxInfo['officialPhone']:''; ?>" disabled required><br>
            </div>
            </div>
        
    </form>

</div>
</div>
    
  </div>
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <div id="school" class="tab-pane fade">
    <h3>School Application</h3>
      <div class="container">
            <div class="well">
          	<form>
            <div class="form-group">
             <legend>School Details</legend>
                <div class="col-md-12">
                    <label for = "schoolName">School Name: </label>
                        <input type="text" class="form-control" name="schoolName" maxlength="50" required autofocus value="<?php echo isset($schoolInfo['schoolname']) ? $schoolInfo['schoolname']: '';?>" disabled><br>
                </div>
                
                <div class="col-md-6">
                    <label for = "schoolAddressStreet">School Street:</label>
                        <input type="text" class="form-control" name="schoolAddressStreet" maxlength="25" required value="<?php echo isset($schoolInfo['schoolAddressStreet']) ? $schoolInfo['schoolAddressStreet']: '';?>" disabled><br>
                </div>
                
                <div class="col-md-6">
                    <label for = "schoolAddress">City,State,Zip: </label>
                        <input type="text" class="form-control" name="schoolAddress" maxlength="25" placeholder="City,State,Zip" required value="<?php echo isset($schoolInfo['schoolAddress']) ? $schoolInfo['schoolAddress']: '';?>" disabled><br>
                </div>
                
        <div class="col-md-12">
            <label for = "schoolPhone"> School Phone Number: </label>
                <input type="text" class="form-control" name="schoolPhone" maxlength="15" placeholder= "(XXX)XXX-XXXX" required value="<?php echo isset($schoolInfo['schoolPhone']) ? $schoolInfo['schoolPhone']: '';?>" disabled><br>
        </div>
                
        <div class = "col-md-12">
            <legend>Student Information</legend>
        </div>
                
        <div class="col-md-6">
            <label for = "studentFirstName">Student's First Name:</label>
               <input type="text" class="form-control" name="studentFirstName" maxlength="25" autofocus value="<?php echo isset($schoolInfo['studentFirstName']) ? $schoolInfo['studentFirstName']:'';?>" disabled><br>
        </div>
        <div class="col-md-6">
            <label for = "studentLastName">Student's Last Name:</label>
               <input type="input" class="form-control" name="studentLastName" maxlength="25" required value="<?php echo isset($schoolInfo['studentLastName']) ? $schoolInfo['studentLastName']:'';?>" disabled><br>
        </div>
                
        <div class="col-md-6">
            <label for = "studentRank">Class Rank:</label>
               <input type="text" class="form-control" name="studentRank" maxlength="3" required value="<?php echo isset($schoolInfo['studentRank']) ? $schoolInfo['studentRank']: '';?>" disabled><br>
        </div>
                
        <div class="col-md-6">
            <label for = "studentGradDate">Expected Graduation Date:</label>
               <input type="date" class="form-control" name="studentGradDate" required value="<?php echo isset($schoolInfo['studentGradDate']) ? $schoolInfo['studentGradDate']: '';?>" disabled><br>
        </div>
                
        <div class = "col-md-12">
        <legend>School Official Information </legend>
        </div>
                
        <div class = "col-md-6">
            <label for = "officialFirstName"> First Name: </label>
                <input type="text" class="form-control" name="officialFirstName" maxlength="25" required value="<?php echo isset($schoolInfo['officialFirstName']) ? $schoolInfo['officialFirstName']: '';?>" disabled><br>
        </div>
                
        <div class="col-md-6">
            <label for = "officialLastName"> Last Name: </label>
                <input type="text" class="form-control" name="officialLastName" maxlength="25" required value="<?php echo isset($schoolInfo['officialLastName']) ? $schoolInfo['officialLastName']: '';?>" disabled><br>
        </div>
                
        <div class="col-md-6">
            <label for = "officialPhone"> Official Phone Number: </label>
                <input type="text" class="form-control" name="officialPhone" maxlength="15" placeholder="(888)555-0000"required value="<?php echo isset($schoolInfo['officialPhone']) ? $schoolInfo['officialPhone']: '';?>" disabled><br>
        </div>
                
        <div class="col-md-6">
            <label for = "officialEmail"> Official Email: </label>
                <input type="email" class="form-control" name="officialEmail" maxlength="50"  required value="<?php echo isset($schoolInfo['officialEmail']) ? $schoolInfo['officialEmail']: '';?>" disabled><br>
        </div>
                
        <div class="col-12-md">
        <legend>Authorization</legend>
        </div>
                
        <div class="col-md-6">
            <label for = "officialSignature"> Please Sign to Agree to the Updated Information: </label>
                <input type="text" class="form-control" name="officialSignature" maxlength="15" placeholder="Electronic Signature"required><br>
        </div>
                
        <div class="col-md-6">
            <label for = "signDate">Date:</label>
                <input type="date" class="form-control" name="signDate" placeholder="mm/dd/yyyy"required><br>
        </div>
    </div>
    </form>
    </div>
    </div>

  </div>

  <div id="student" class="tab-pane fade">
    <h3>Student Application</h3>
    <p>Some content in menu 2.</p>
  </div>
  <div id="parent" class="tab-pane fade">
    <h3>Parent Consent Form</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>


</body>
</html>