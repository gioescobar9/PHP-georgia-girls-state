<!DOCTYPE html>
<html>
<head>
    <title>Consent Form</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/rolesStyleSheet.css">
    

</head>
<header>
<!-- create nav bar design, not complete yet just here for layout image-->
<nav class="navigation">
<div class="nav">
<ul class="topnav" id="myTopnav">
  <li><a class="#student" href="student.html">Student Form</a></li>
  <li><a href="#info">My Information</a></li>
  <!--<li><img src="georgiaLogo.jpg" id="logo" style="width:75px;height:75px;" /></li>-->
  <li><a class="active" href="parentConsentForm.html">Medical Consent Form</a></li>
  <li><a href="#about">About</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  <div class="logo"></div>
</ul>
</div>
</nav>
</header>
<body>
<div class="radioContainer">
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <h3>Consent Form</h3>
                    <legend>Parent Information</legend>
                    <div class="col-md-6">
                        <label for = "motherName"> Mother/Guardian Name:</label><br>
                            <input type="text" class="form-control" id="motherName" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "motherPhone"> Mother/Guardian Phone:</label><br>
                            <input type="text" class="form-control" id="motherName" maxlength="20" pattern="[1-9()-]+" placeholder="(555)888-0000"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherName">Father/Guardian Name:</label><br>
                            <input type="text" class="form-control" id="fatherName" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "fatherPhone">Father/Guardian Phone:</label><br>
                            <input type="text" class="form-control" id="fatherName" maxlength="20" pattern="[1-9()-]+" placeholder="(555)888-0000"><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyName">Emergency Contact Name:</label><br>
                            <input type="text" class="form-control" id="emergencyName" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                     <div class="col-md-6">
                        <label for = "emergencyRelationship">Emergency Contact Relationship:</label><br>
                            <input type="text" class="form-control" id="emergencyRelationship" maxlength="25" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "emergencyPhone"> Emergency Contact Phone:</label><br>
                            <input type="text" class="form-control" id="emergecncyPhone" maxlength="20" pattern="[1-9()-]+" placeholder="(555)888-0000"><br>
                    </div>
                    <legend>Personal Information</legend>
                    <div class="col-md-8">
                    <label>Has your child had any serious illness?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showIllness()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideIllness()">No<br><br>
                        <div id="textIllness">
                            Please Explain below:<br>
                            <textarea id="illnessInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>
    
                    <div class="col-md-8">
                    <label> Is your child being treated for chronic health conditions?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showTreatment()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideTreatment()">No<br><br>
                        <div id="textTreatment">
                            Please list below:<br>
                            <textarea id="treatmentInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>
                   
                    
                    
                    <div class="col-md-8">
                    <label> Does your child have any allergies?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAllergies()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAllergies()">No<br><br>
                        <div id="textAllergies">
                            Please list below:<br>
                            <textarea id="allergiesInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="col-md-8">
                    <label> Does your child take any prescriptions or herbal medicines regularly?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showMeds()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideMeds()">No<br><br>
                        <div id="textMeds">
                            Please list below:<br>
                            <textarea id="medsInput" class="form-control" rows="5" cols="50" placeholder="med1,med2,med3"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                    <label> Does your child require any special accomodations?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showAccomodations()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideAccomodations()">No<br><br>
                        <div id="textAccomodations">
                            Please Explain below:<br>
                            <textarea id="accomodationsInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>

                     <div class="col-md-8">
                    <label> Does your child have any restrictions or personal requests?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showRestrictions()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideRestrictions()">No<br><br>
                        <div id="textRestrictions">
                            Please Explain below:<br>
                            <textarea id="RestrictionsInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for = "physiciansName">Physician's Name: </label>
                            <input type="text" class="form-control" id="physiciansName" maxlength="50"" pattern="[a-zA-Z ]+" required><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "physiciansPhoneNumber">Phone Number: </label>
                            <input type="text" class="form-control" id="physiciansPhoneNumber" maxlength="50"" pattern="[1-9-()]+" required placeholder="(555)888-0000"><br>
                    </div>

                    <legend>Insurance Provider Information</legend>
                    <div class="col-md-8">
                    <label> Is your child insured?</label><br>
                        <input type="radio" name="answer" id="yes" onclick="showInfo()" >Yes
                        <input type="radio" name="answer" id="no" onclick="hideInfo()" >No<br><br>
                    </div>
                    <div class="insured">
                    <div class="col-md-12">
                        <label for = "insuranceCompany" >Insurance Company:</label>
                            <input type="text" class="form-control" id="insuranceCompany" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroup" >Group Name:</label>
                            <input type="text" class="form-control" id="insuranceGroup" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceGroupNumber" >Group Number:</label>
                            <input type="text" class="form-control" id="insuranceGroupNumber" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "insuranceAddressStreet" >Insurance Street Address:</label>
                            <input type="text" class="form-control" id="insuranceAddressStreet" maxlength="50" ><br>
                    </div>

                    <div class="col-md-6">
                        <label for = "insuranceGroup" >Insurance City,State,Zip:</label>
                            <input type="text" class="form-control" id="insuranceGroup" maxlength="50" pattern="[a-zA-Z 1-9 ,]+" placeholder="City,State,Zip" required><br>
                    </div>

                    </div>
                    <legend>Medical Release Agreement</legend>
                    <div class="col-md-6">
                        <label for = "childsName" >As parent or Guardian of:</label>
                            <input type="text" class="form-control" id="childsName" maxlength="50" pattern="[a-zA-Z ]+" required><br>
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
                            or shall have by any reason of illness, injury or accident incurred or suffered by <div class="col-md-8"><input type="text" class="form-control" id="enterChildsName" maxlength="50" 
                            pattern="[a-zA-Z ]+" placeholder="Daughter's Name"required></div><br><br><br>
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
                            <textarea id="consentInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                     <label>Does your daughter have any physical or emotional condition, or is she taking any medication (prescribed) that girls state should be aware of?      </label><br>
                        <input type="radio" name="answer" id="yes" onclick="showCondition()">Yes
                        <input type="radio" name="answer" id="no" onclick="hideCondition()">No<br><br>
                        <div id="textCondition">
                            If yes, please explain:<br>
                            <textarea id="conditionInput" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for = "parentSignature"> Parent/Guardian Signature:</label><br>
                            <input type="text" class="form-control" id="parentSignature" maxlength="50" pattern="[a-zA-Z ]+" ><br>
                    </div>
                    <div class="col-md-6">
                        <label for = "signDate">Today's Date:</label>
                            <input type="date" class="form-control" id="signDate" placeholder="mm/dd/yyyy"required><br>
                    </div>

                    <div class="buttonStudent">

                        <button type="submit" class="buttonNext" color="white" formaction="student.html">Previous</button>

                        <button type="submit" class="buttonSubmit" color="black">Submit Form</button>

                        <button type="submit" class="buttonSave" color="white">Save Form</button>

                    </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

    /*jQuery used to hide the text boxes initially until yes is selected*/
    $(document).ready(function(){
        $("#textIllness").hide();
    });

    /* JS functions used to hide or show the input area once a selection is made*/
        function showIllness() { $("#textIllness").show(); }
        function hideIllness() { $("#textIllness").hide();}

         $(document).ready(function(){
        $("#textTreatment").hide();
    });
        function showTreatment() { $("#textTreatment").show(); }
        function hideTreatment() { $("#textTreatment").hide(); }

        $(document).ready(function(){
        $("#textAllergies").hide();
    });
        function showAllergies() { $("#textAllergies").show(); }
        function hideAllergies() { $("#textAllergies").hide(); }

        $(document).ready(function(){
        $("#textMeds").hide();
    });
        function showMeds() { $("#textMeds").show();}
        function hideMeds() { $("#textMeds").hide();}

        $(document).ready(function(){
        $("#textAccomodations").hide();
    });
        function showAccomodations() { $("#textAccomodations").show(); }
        function hideAccomodations() { $("#textAccomodations").hide(); }

          $(document).ready(function(){
        $("#textMeds").hide();
    });

         function showMeds() {  $("#textMeds").show();}
        function hideMeds() { $("#textMeds").hide(); }

        $(document).ready(function(){
        $("#textRestrictions").hide();
    });
        function showRestrictions() { $("#textRestrictions").show(); }
        function hideRestrictions() { $("#textRestrictions").hide(); }

        $(document).ready(function(){
        $("#textConsent").hide();
    });
        function showConsent() { $("#textConsent").show(); }
        function hideConsent() { $("#textConsent").hide(); }

           $(document).ready(function(){
        $("#textCondition").hide();
    });
        function showCondition() { $("#textCondition").show(); }
        function hideCondition() { $("#textCondition").hide(); }

        $(document).ready(function(){
        $(".insured").hide();
    });
        function showInfo() {$(".insured").show();}
        function hideInfo() {$(".insured").hide();}

     

</script>
</body>
</div>
</html>