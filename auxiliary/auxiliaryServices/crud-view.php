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
            <div class = "signature">
        <div class="col-md-6">
            <label for = "officialSignature"> Please Sign to Agree to the Updated Information: </label>
                <input type="text" class="form-control" name="officialSignature" maxlength="15" placeholder="Electronic Signature"required><br>
        </div>
                
        <div class="col-md-6">
            <label for = "signDate">Date:</label>
                <input type="date" class="form-control" name="signDate" placeholder="mm/dd/yyyy"required><br>
        </div>
            </div>
    </div>
    </form>
    </div>
    </div>

  </div> <!-- tab-pane -->

  <div id="student" class="tab-pane fade">
    <h3>Student Application</h3>
 	<div class="container">
<div class="well">

<form class="form-horizontal" role="form" action="student-edit-application-form-action.php" method="post">
    <div class="form-group">
            <div class = "col-md-12">
           <legend>Personal Information</legend>
        </div>
           <div class="col-md-6">
            <label for = "studentFirstName">First Name:</label>
               <input type="text" class="form-control" name="studentFirstName" maxlength="25" autofocus required value="<?php echo isset($studentInfo['studentFirstName'])? $studentInfo['studentFirstName']: '';?>" disabled><br>
           </div>
           <div class="col-md-6">
            <label for = "studentMiddleName">Middle Name:</label>
               <input type="text" class="form-control" name="studentMiddleName" maxlength="25" value="<?php echo isset($studentInfo['studentMiddleName'])? $studentInfo['studentMiddleName']: '';?>" disabled><br>
           </div>
           <div class="col-md-6">
            <label for = "studentLastName">Last Name:</label>
               <input type="text" class="form-control" name="studentLastName" required value="<?php echo isset($studentInfo['studentLastName'])? $studentInfo['studentLastName']: '';?>" disabled><br>
           </div>
           <div class="col-md-6">
            <label for = "studentDOB">Date of Birth:</label>
                <input type="date" class="form-control" name="studentDOB" placeholder="mm/dd/yyyy" required value="<?php echo isset($studentInfo['studentDOB'])? $studentInfo['studentDOB']: '';?>" disabled><br>
           </div>
              <div class="col-md-6">
                <label for = "studentStreetAddress"> Street Address:</label>
                    <input type="text" class="form-control" name="studentStreetAddress" required value="<?php echo isset($studentInfo['studentStreetAddress'])? $studentInfo['studentStreetAddress']: '';?>" disabled ><br>
              </div>
              <div class="col-md-12">
                <label for = "studentAddress">City,State,Zip:</label>
                    <input type="text" class="form-control" name="studentAddress" required placeholder="City,State,Zip" value="<?php echo isset($studentInfo['studentAddress'])? $studentInfo['studentAddress']: '';?>" disabled >
                    <br>
              </div>
           <div class="col-md-3">
           </div>
           <div class="col-md-6" align="center">
             <label for = "studentPreferName">Name to display on name tag:</label><br>
                <input type="text" class="form-control" name="studentPreferName" maxlength="25"  required value="<?php echo isset($studentInfo['studentPreferName'])? $studentInfo['studentPreferName']: '';?>" disabled><br>
            </div>
          
            <div class="col-md-12">
                <legend>Contact Information</legend>
            </div>
           <div class="col-md-6">
            <label for = "homePhone">Home Phone:</label>
                <input type="text" class="form-control" name="homePhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo isset($studentInfo['homePhone'])? $studentInfo['homePhone']: '';?>" disabled><br>
           </div>
           <div class="col-md-6">
            <label for = "parentCellPhone">Parent Cell Phone:</label>
                <input type="text" class="form-control" name="parentCellPhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo isset($studentInfo['parentCellPhone'])? $studentInfo['parentCellPhone']: '';?>" disabled><br>
           </div>
           <div class="col-md-6">
            <label for = "emergencyPhone">Emergency Contact Number:</label>
                <input type="text" class="form-control" name="emergencyPhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo isset($studentInfo['emergencyPhone'])? $studentInfo['emergencyPhone']: '' ;?>" disabled><br>
           </div>
           <div class="col-md-6">
               <label for = "girlsCell">Girls Cell Phone:(If Available)</label>
                   <input type="text" class="form-control" name="girlsCell" maxlength="13" placeholder="Optional" value="<?php echo isset($studentInfo['girlsCell'])? $studentInfo['girlsCell']: '';?>" disabled ><br>
           </div>
           <div class="col-md-6">
            <label for = "studentEmail">Student Email:</label>
                <input type="email" class="form-control" name="studentEmail" placeholder="name@email.com" required value="<?php echo isset($studentInfo['studentEmail'])? $studentInfo['studentEmail']: '' ;?>" disabled><br>
            </div>
            <div class="col-md-6">
            <label for = "parentEmail">Parent Email:</label>
                <input type="email" class="form-control" name="parentEmail" placeholder="name@email.com" required value="<?php echo isset($studentInfo['parentEmail'])? $studentInfo['parentEmail']: '';?>" disabled><br>
        </div>
        <div class="col-md-12">
            <legend>Authorization</legend>
        </div>
        <div class ="col-md-12">
            <h5>By signing below I agree that all information provided is correct on behalf of the Student and Parent:</h5><br>
        </div>
      <div class="signature">
        <div class="col-md-6">
            <label for = "studentSignature">Student Signature</label>
                <input type="text" class="form-control" name="studentSignature" placeholder="Electronic Signature" required ><br>
        </div>
        <div class="col-md-6">
            <label for = "parentSignature">Parent Signature</label>
                <input type="text" class="form-control" name="parentSignature" placeholder="Electronic Signature" required><br>
        </div>
    </div>
 
  
</div>

</form>
    
</div>
</div>

  </div>

  <div id="parent" class="tab-pane fade">
    <h3>Parent Consent Form</h3>
    <div class="container">
    <div class="well">
    <form class="form-horizontal" role="form" action="edit-parent-consent-form-action.php" method="post">
        <div class="form-group">
                    <div class="col-md-12">
                        <legend>Parent Information</legend>
                    </div>
                    <div class="col-md-6">
                        <label for = "motherName"> Mother/Guardian Name:</label><br>
                            <input type="text" class="form-control" name="motherName" maxlength="50" value="<?php echo isset($parentConsentInfo['motherName'])? $parentConsentInfo['motherName']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "motherPhone"> Mother/Guardian Phone:</label><br>
                            <input type="text" class="form-control" name="motherPhone" maxlength="20" placeholder="(555)888-0000" value="<?php echo isset($parentConsentInfo['motherPhone'])? $parentConsentInfo['motherPhone']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherName">Father/Guardian Name:</label><br>
                            <input type="text" class="form-control" name="fatherName" maxlength="50" value="<?php echo isset($parentConsentInfo['fatherName'])? $parentConsentInfo['fatherName']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherPhone">Father/Guardian Phone:</label><br>
                            <input type="text" class="form-control" name="fatherPhone" maxlength="20" placeholder="(555)888-0000" value="<?php echo isset($parentConsentInfo['fatherPhone'])? $parentConsentInfo['fatherPhone']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyName">Emergency Contact Name:</label><br>
                            <input type="text" class="form-control" name="emergencyName" maxlength="50" value="<?php echo isset($parentConsentInfo['emergencyName'])? $parentConsentInfo['emergencyName']: '';?>" disabled><br>
                    </div>
                     <div class="col-md-6">
                        <label for = "emergencyRelationship">Emergency Contact Relationship:</label><br>
                            <input type="text" class="form-control" name="emergencyRelationship" maxlength="25" value="<?php echo isset($parentConsentInfo['emergencyRelationship'])? $parentConsentInfo['emergencyRelationship']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyPhone"> Emergency Contact Phone:</label><br>
                            <input type="text" class="form-control" name="emergencyPhone" maxlength="20" placeholder="(555)888-0000" value="<?php echo isset($parentConsentInfo['emergencyPhone'])? $parentConsentInfo['emergencyPhone']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-12">
                        <legend>Personal Information</legend>
                    </div>
                    <div class="col-md-8">
                    <label>Has your child had any serious illness?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showIllness()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideIllness()">No<br><br>
                        <div id="textIllness">
                            Please Explain below:<br>
                            <textarea name="illnessInput"class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['illnessInput'])? $parentConsentInfo['illnessInput']: '';?>" disabled ></textarea>
                        </div>
                    </div>
    
                    <div class="col-md-8">
                    <label> Is your child being treated for chronic health conditions?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showTreatment()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideTreatment()">No<br><br>
                        <div id="textTreatment">
                            Please list below:<br>
                            <textarea name="treatmentInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['treatmentInput'])? $parentConsentInfo['treatmentInput']: '';?>" disabled></textarea>
                        </div>
                    </div>
                   
                    
                    <div class="col-md-8">
                    <label> Does your child have any allergies?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAllergies()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAllergies()">No<br><br>
                        <div id="textAllergies">
                            Please list below:<br>
                            <textarea name="allergiesInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['allergiesInput'])? $parentConsentInfo['allergiesInput']: '';?>" disabled></textarea>
                        </div>
                    </div>

                    <div class="col-md-8">
                    <label> Does your child take any prescriptions or herbal medicines regularly?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showMeds()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideMeds()">No<br><br>
                        <div id="textMeds">
                            Please list below:<br>
                            <textarea name="medsInput" class="form-control" rows="5" cols="50" placeholder="med1,med2,med3" value="<?php echo isset($parentConsentInfo['medsInput'])? $parentConsentInfo['medsInput']: '';?>" disabled></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                    <label> Does your child require any special accomodations?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAccomodations()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAccomodations()">No<br><br>
                        <div id="textAccomodations">
                            Please Explain below:<br>
                            <textarea name="accomodationsInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['accomodationsInput'])? $parentConsentInfo['accomodationsInput']: '';?>" disabled></textarea>
                        </div>
                    </div>

                     <div class="col-md-8">
                    <label> Does your child have any restrictions or personal requests?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showRestrictions()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideRestrictions()">No<br><br>
                        <div id="textRestrictions">
                            Please Explain below:<br>
                            <textarea name="restrictionsInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['restrictionsInput'])? $parentConsentInfo['restrictionsInput']: '';?>" disabled></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for = "physicianName">Physician's Name: </label>
                            <input type="text" class="form-control" name="physicianName" maxlength="50"required value="<?php echo isset($parentConsentInfo['physicianName'])? $parentConsentInfo['physicianName']: '';?>" disabled><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "physicianPhoneNumber">Phone Number: </label>
                            <input type="text" class="form-control" name="physicianPhoneNumber" maxlength="50"required placeholder="(555)888-0000" value="<?php echo isset($parentConsentInfo['physicianPhoneNumber'])? $parentConsentInfo['physicianPhoneNumber']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-12">
                        <legend>Insurance Provider Information</legend>
                    </div>
                    <div class="col-md-8">
                    <label> Is your child insured?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showInfo()" >Yes
                        <input type="radio" name="answer" id="no" onclick="hideInfo()" >No<br><br>
                    </div>
                    <div class="insured">
                    <div class="col-md-12">
                        <label for = "insuranceCompany" >Insurance Company:</label>
                            <input type="text" class="form-control" name="insuranceCompany" maxlength="50" value="<?php echo isset($parentConsentInfo['insuranceCompany'])? $parentConsentInfo['insuranceCompany']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroup" >Group Name:</label>
                            <input type="text" class="form-control" name="insuranceGroup" maxlength="50" value="<?php echo isset($parentConsentInfo['insuranceGroup'])? $parentConsentInfo['insuranceGroup']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroupNumber" >Group Number:</label>
                            <input type="text" class="form-control" name="insuranceGroupNumber" maxlength="50" value="<?php echo isset($parentConsentInfo['insuranceGroupNumber'])? $parentConsentInfo['insuranceGroupNumber']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceAddressStreet" >Insurance Street Address:</label>
                            <input type="text" class="form-control" name="insuranceAddressStreet" maxlength="50" value="<?php echo isset($parentConsentInfo['insuranceAddressStreet'])? $parentConsentInfo['insuranceAddressStreet']: '';?>" disabled><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "insuranceAddress" >Insurance City,State,Zip:</label>
                    <input type="text" class="form-control" name="insuranceAddress" maxlength="50" placeholder="City,State,Zip" value="<?php echo isset($parentConsentInfo['insuranceAddress'])? $parentConsentInfo['insuranceAddress']: '';?>" disabled><br>
                    </div>

                    </div>
                    <div class="col-md-12">
                        <legend>Medical Release Agreement</legend>
                    </div>
                    <div class="col-md-6">
                        <label for = "childsName" >As parent or Guardian of:</label>
                            <input type="text" class="form-control" name="childsName" maxlength="50"required value="<?php echo isset($parentConsentInfo['childsName'])? $parentConsentInfo['childsName']: '';?>" disabled><br>
                    </div>
                    <div class="col-md-12">
                    <div class="terms">
                        <legend class="legendTerms">I AGREE AND CONFIRM:</legend>
                            In consideration of instruction and training to be given to her as a citizen of GEORGIA GIRLS STATE, 
                            AMERICAN LEGION AUXILIARY, DEPARTMENT OF GEORGIA, INC. TO BE HELD AT GEORGIA SOUTHERN UNIVERSITY IN STATESBORO, 
                            GA. ON THE DATES OF JUNE 11 - 16, 2017, do hereby give consent for her to participate fully in all planned activities 
                            of Girls State.  
                            We hereby release and discharge THE AMERICAN LEGION AUXILIARY, DEPARTMENT OF GEORGIA, INC., its Officers, Agents, 
                            Instructors and Employees, from all claims, demands, damages, suits, actions or causes of action which we may, can 
                            or shall have by any reason of illness, injury or accident incurred or suffered by
<div class="col-md-8"><input type="text" class="form-control" name="enterChildsName" maxlength="50"placeholder="Daughter's Name" required value="<?php echo isset($parentConsentInfo['enterChildsName'])? $parentConsentInfo['enterChildsName']: '';?>" disabled></div><br><br><br>
                            while in attendance at said Girls State, no matter how caused or occasioned.

	                            
                    </div>
                    </div>
                    <div class ="labelCenter">
                        <label for = "medicalConsent" align="center">By checking below, I Hereby Authorize Medical 
                            Treatment to be administered while she is attending Georgia Girls State:</label><br>
                            <input type="checkbox" data-group-cls="btn-group" id="medicalConsent" required>
                    </div>

                    <div class="col-md-12">
                    <label> Does the Georgia Girls State nurse have permission to administer Over-the-Counter medications to your daughter?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showConsent()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideConsent()">No<br><br>
                        <div id="textConsent">
                            If you have any restrictions please list them:<br>
                            <textarea name="consentInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['consentInput'])? $parentConsentInfo['consentInput']: '';?>" disabled></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                     <label>Does your daughter have any physical or emotional condition, or is she taking any medication (prescribed) that girls state should be aware of?      </label><br>
                        <input type="radio" name="answer" id="yes" onclick="showCondition()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideCondition()">No<br><br>
                        <div id="textCondition">
                            If yes, please explain:<br>
                            <textarea name="conditionInput" class="form-control" rows="5" cols="50" value="<?php echo isset($parentConsentInfo['conditionInput'])? $parentConsentInfo['conditionInput']: '';?>" disabled></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for = "parentSignature"> Parent/Guardian Signature:</label><br>
                            <input type="text" class="form-control" name="parentSignature" maxlength="50" required><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "signDate">Today's Date:</label>
                            <input type="date" class="form-control" name="signDate" placeholder="mm/dd/yyyy"required><br>
                    </div>

            
            </div>
        </form>
    </div>

    <!-- JS functions used to hide or show the input area once a selection is made -->
    <script type="text/javascript">
        
        hideIllness();
        function showIllness() { $("#textIllness").show(); }
        function hideIllness() { $("#textIllness").hide();}

      hideTreatment();
        function showTreatment() { $("#textTreatment").show(); }
        function hideTreatment() { $("#textTreatment").hide(); }

      hideAllergies();
        function showAllergies() { $("#textAllergies").show(); }
        function hideAllergies() { $("#textAllergies").hide(); }

     hideMeds();
        function showMeds() { $("#textMeds").show();}
        function hideMeds() { $("#textMeds").hide();}

    hideAccomodations();
        function showAccomodations() { $("#textAccomodations").show(); }
        function hideAccomodations() { $("#textAccomodations").hide(); }

      hideRestrictions();
        function showRestrictions() { $("#textRestrictions").show(); }
        function hideRestrictions() { $("#textRestrictions").hide(); }

       hideConsent();
        function showConsent() { $("#textConsent").show(); }
        function hideConsent() { $("#textConsent").hide(); }

     hideCondition();
        function showCondition() { $("#textCondition").show(); }
        function hideCondition() { $("#textCondition").hide(); }

       hideInfo();
        function showInfo() {$(".insured").show();}
        function hideInfo() {$(".insured").hide();}

        
   
</script>
</div>
  </div>
</div>

</body>
</html>