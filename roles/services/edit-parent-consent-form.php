<?php
        
            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();

            $auxConnection=connectAuxDB();

            //retrieve the studentID for use in query
            $studentID = $_COOKIE['studentID'];
        
            //query the database based on studentID
            $query = "SELECT parentConsentInfo FROM applications WHERE studentID='$studentID'";
            
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $rows = $result->num_rows;
            
            //the query will result in an associative array with the value being the string we inserted into the table
            $info = mysqli_fetch_assoc($result); 
        
            //need to find a better way to get the value of the assc array
            foreach($info as $x => $x_value) {
                //echo "Key=" . $x . ", Value=" . $x_value;
                //echo "<br>";
            }
        
       
            //split the string on our chosen delimiter of '^'
            $studentInfo = explode("^",$x_value);
            $stringInfo = "";
            $item = array();
            $asscStudent = array();
            $i=1;
            $count=count($studentInfo);
        
        //create an associative array which we will use to autofill the form
        foreach($studentInfo as $values)
        {
            $stringInfo = $values;
            if($i < $count)
            {
                $newStringInfo = explode(":",$stringInfo);
                $asscStudent=array("$newStringInfo[0]"=>"$newStringInfo[1]");
            }
            $i++;
            
            $item = array_merge($item, $asscStudent);
        }
        
        $count2 = count($item);

        //check for an empty string here
        if(!$count2 > 0){
            $redirect = "../student-interface.php";
            header('location:'.$redirect);
        }
        //print_r($item);
?>
        
        
<html>
    <head>
        <title>Edit Consent Form</title>
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
        <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">
    </head>
<body>
<header>
    <div class="heading">
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
            <a href = "../student-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    </div>
</header>
<div class="body">
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
    <div class="well">
    <form class="form-horizontal" role="form" action="edit-parent-consent-form-action.php" method="post">
        <div class="form-group">
                <h3>Consent Form</h3>
                    <div class="col-md-12">
                        <legend>Parent Information</legend>
                    </div>
                    <div class="col-md-6">
                        <label for = "motherName"> Mother/Guardian Name:</label><br>
                            <input type="text" class="form-control" name="motherName" maxlength="50" value="<?php echo $item["motherName"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "motherPhone"> Mother/Guardian Phone:</label><br>
                            <input type="text" class="form-control" name="motherPhone" maxlength="20"placeholder="(555)888-0000" value="<?php echo $item["motherPhone"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherName">Father/Guardian Name:</label><br>
                            <input type="text" class="form-control" name="fatherName" maxlength="50" value="<?php echo $item["fatherName"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherPhone">Father/Guardian Phone:</label><br>
                            <input type="text" class="form-control" name="fatherPhone" maxlength="20"placeholder="(555)888-0000" value="<?php echo $item["fatherPhone"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyName">Emergency Contact Name:</label><br>
                            <input type="text" class="form-control" name="emergencyName" maxlength="50" value="<?php echo $item["emergencyName"];?>"><br>
                    </div>
                     <div class="col-md-6">
                        <label for = "emergencyRelationship">Emergency Contact Relationship:</label><br>
                            <input type="text" class="form-control" name="emergencyRelationship" maxlength="25" value="<?php echo $item["emergencyRelationship"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyPhone"> Emergency Contact Phone:</label><br>
                            <input type="text" class="form-control" name="emergencyPhone" maxlength="20"placeholder="(555)888-0000" value="<?php echo $item["emergencyPhone"];?>"><br>
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
                            <textarea name="illnessInput"class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>
    
                    <div class="col-md-8">
                    <label> Is your child being treated for chronic health conditions?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showTreatment()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideTreatment()">No<br><br>
                        <div id="textTreatment">
                            Please list below:<br>
                            <textarea name="treatmentInput" class="form-control" rows="5" cols="50" value="<?php echo $item["treatmentInput"];?>"></textarea>
                        </div>
                    </div>
                   
                    
                    
                    <div class="col-md-8">
                    <label> Does your child have any allergies?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAllergies()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAllergies()">No<br><br>
                        <div id="textAllergies">
                            Please list below:<br>
                            <textarea name="allergiesInput" class="form-control" rows="5" cols="50" value="<?php echo $item["allergiesInput"];?>"></textarea>
                        </div>
                    </div>

                    <div class="col-md-8">
                    <label> Does your child take any prescriptions or herbal medicines regularly?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showMeds()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideMeds()">No<br><br>
                        <div id="textMeds">
                            Please list below:<br>
                            <textarea name="medsInput" class="form-control" rows="5" cols="50" placeholder="med1,med2,med3" value="<?php echo $item["medsInput"];?>"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                    <label> Does your child require any special accomodations?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAccomodations()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAccomodations()">No<br><br>
                        <div id="textAccomodations">
                            Please Explain below:<br>
                            <textarea name="accomodationsInput" class="form-control" rows="5" cols="50" value="<?php echo $item["accomodationsInput"];?>"></textarea>
                        </div>
                    </div>

                     <div class="col-md-8">
                    <label> Does your child have any restrictions or personal requests?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showRestrictions()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideRestrictions()">No<br><br>
                        <div id="textRestrictions">
                            Please Explain below:<br>
                            <textarea name="restrictionsInput" class="form-control" rows="5" cols="50" value="<?php echo $item["restrictionsIpnut"];?>"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for = "physicianName">Physician's Name: </label>
                            <input type="text" class="form-control" name="physicianName" maxlength="50"required value="<?php echo $item["physicianName"];?>"><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "physicianPhoneNumber">Phone Number: </label>
                            <input type="text" class="form-control" name="physicianPhoneNumber" maxlength="50"required placeholder="(555)888-0000" value="<?php echo $item["physicianPhoneNumber"];?>"><br>
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
                            <input type="text" class="form-control" name="insuranceCompany" maxlength="50" value="<?php echo $item["insuranceCompany"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroup" >Group Name:</label>
                            <input type="text" class="form-control" name="insuranceGroup" maxlength="50" value="<?php echo $item["insuranceGroup"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroupNumber" >Group Number:</label>
                            <input type="text" class="form-control" name="insuranceGroupNumber" maxlength="50" value="<?php echo $item["insuranceGroupNumber"];?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceAddressStreet" >Insurance Street Address:</label>
                            <input type="text" class="form-control" name="insuranceAddressStreet" maxlength="50" value="<?php echo $item["insuranceAddressStreet"];?>"><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "insuranceAddress" >Insurance City,State,Zip:</label>
                    <input type="text" class="form-control" name="insuranceAddress" maxlength="50" placeholder="City,State,Zip" value="<?php echo $item["insuranceAddress"];?>"><br>
                    </div>

                    </div>
                    <div class="col-md-12">
                        <legend>Medical Release Agreement</legend>
                    </div>
                    <div class="col-md-6">
                        <label for = "childsName" >As parent or Guardian of:</label>
                            <input type="text" class="form-control" name="childsName" maxlength="50"required value="<?php echo $item["childsName"];?>"><br>
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
<div class="col-md-8"><input type="text" class="form-control" name="enterChildsName" maxlength="50"placeholder="Daughter's Name" required value="<?php echo $item["enterChildsName"];?>"></div><br><br><br>
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
                            <textarea name="consentInput" class="form-control" rows="5" cols="50" value="<?php echo $item["consentInput"];?>"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                     <label>Does your daughter have any physical or emotional condition, or is she taking any medication (prescribed) that girls state should be aware of?      </label><br>
                        <input type="radio" name="answer" id="yes" onclick="showCondition()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideCondition()">No<br><br>
                        <div id="textCondition">
                            If yes, please explain:<br>
                            <textarea name="conditionInput" class="form-control" rows="5" cols="50" value="<?php echo $item["conditionInput"];?>"></textarea>
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

                    <div class="buttonStudent">

                     <button type="submit" class="buttonSubmit" color="black">Submit Form</button>

                    </div>
            </div>
        </form>
    </div>

    /* JS functions used to hide or show the input area once a selection is made*/
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
</body>
</html>
    