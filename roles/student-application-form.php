<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Application</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/rolesStyleSheet.css">

</head>

<body>
<header>
<!-- create nav bar design, not complete yet just here for layout image-->
<nav class="navigation">
<div class="nav">
<ul class="topnav" id="myTopnav">
  <li><a class="active" href="student.html">Student Form</a></li>
  <li><a href="#info">My Information</a></li>
  <!--<li><img src="georgiaLogo.jpg" id="logo" style="width:75px;height:75px;" /></li>-->
  <li><a class="#medicalConsent" href="parentConsentForm.html">Medical Consent Form</a></li>
  <li><a href="#about">About</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  <div class="logo"></div>
</ul>
</div>
</nav>

</header>
<div class = "body">
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">
<form class="form-horizontal" role="form">
    <div class="form-group">
           <h3>Student Information Form</h3>
           <legend>Personal Information</legend>
           <div class="col-md-6">
            <label for = "studentFirstName">First Name:</label>
               <input type="text" class="form-control" id="studentFirstName" maxlength="25" pattern="[a-zA-Z]+" autofocus required><br>
           </div>
           <div class="col-md-6">
            <label for = "studentMiddleName">Middle Name:</label>
               <input type="text" class="form-control" id="studentMiddleName" maxlength="25" pattern="[a-zA-Z]+" ><br>
           </div>
           <div class="col-md-6">
            <label for = "studentLastName">Last Name:</label>
               <input type="text" class="form-control" id="studentLastName" pattern="[a-zA-Z]+" required><br>
           </div>
           <div class="col-md-6">
            <label for = "studentDOB">Date of Birth:</label>
                <input type="date" class="form-control" id="studentDOB" placeholder="mm/dd/yyyy" required><br>
           </div>
              <div class="col-md-6">
                <label for = "studentStreetAddress"> Street Address:</label>
                    <input type="text" class="form-control" id="studentStreetAddress" pattern="[a-zA-Z1-9 . ]+" required ><br>
              </div>
              <div class="col-md-12">
                <label for = "studentAddress">City,State,Zip:</label>
                    <input type="text" class="form-control" id="studentAddress" required placeholder="City,State,Zip"><br>
              </div>
           <div class="col-md-3">
           </div>
           <div class="col-md-6" align="center">
             <label for = "studentPreferName">Name to display on name tag:</label><br>
             <input type="text" class="form-control" id="studentPreferName" maxlength="25" pattern="[a-zA-z ]+" required>
            </div>
            <div class="col-md-3"><br><br><br>
           </div>

            <legend>Contact Information</legend>
           <div class="col-md-6">
            <label for = "homePhone">Home Phone:</label>
                <input type="text" class="form-control" id="homePhone" maxlength="13" placeholder="(555)888-0000"><br>
           </div>
           <div class="col-md-6">
            <label for = "parentCellPhone">Parent Cell Phone:</label>
                <input type="text" class="form-control" id="parentCellPhone" maxlength="13" placeholder="(555)888-0000"><br>
           </div>
           <div class="col-md-6">
            <label for = "emergencyPhone">Emergency Contact Number:</label>
                <input type="text" class="form-control" id="emergencyPhone" maxlength="13" placeholder="(555)888-0000"><br>
           </div>
           <div class="col-md-6">
               <label for = "girlsCell">Girls Cell Phone:(If Available)</label>
                   <input type="text" class="form-control" id="girlsCell" maxlength="13" placeholder="Optional"><br>
           </div>
           <div class="col-md-6">
            <label for = "studentEmail">Student Email:</label>
                <input type="email" class="form-control" id="studentEmail" placeholder="name@email.com" required><br>
            </div>
            <div class="col-md-6">
            <label for = "studentEmail">Parent Email:</label>
                <input type="email" class="form-control" id="parentEmail" placeholder="name@email.com" required><br>
        </div>
        <legend>Authorization</legend>
        <h5>By signing below I agree that all information provided is correct on behalf of the Student and Parent:</h4>
      <div class="signature">
    <div class="col-md-6">
    <label for = "studentSignature">Student Signature</label>
    <input type="text" class="form-control" id="studentSignature" placeholder="Electronic Signature" pattern="[a-zA-Z]+" required><br>
    </div>
     <div class="col-md-6">
    <label for = "parentSignature">Parent Signature</label>
    <input type="text" class="form-control" id="parentSignature" placeholder="Electronic Signature" pattern="[a-zA-Z]+" required><br>
    </div>
    </div>
    <div class ="labelCenter">
    <label for = "termsAgreement" align="center">By checking the box below as Student and Parent I adknowledge that I agree to the below terms:</label><br>
        <input type="checkbox" data-group-cls="btn-group-lg" id="termsAgreement" required>
    </div>
  
    <br><div class="terms">
    <legend class="legendTerms">I UNDERSTAND THAT:</legend>
        -This American Legion Auxiliary Unit And/Or Other Sponsors Have Paid The Fees For Me To Attend Girls State.<br><br>
        -This Money Is Not Refundable.  If I Am Unable To Attend And A Suitable Alternate Is Unable To Attend,<br>
         &nbspThe Fees Will Be Forfeited And I May Be Asked To Repay The Fees To The Unit And/Or Sponsor.<br><br>
        -This Is Not A Camp, But Rather An Educational Process. <br><br>
        -I Will Notify The Sponsoring American Legion Auxiliary Unit As Far In Advance As Possible If I Will Be Unable To Attend.<br><br> 
        -To Satisfactorily Complete This Program, I Must Arrive by 4:00 PM On Sunday and Stay Until After Graduation On Friday. <br><br>
        -There Are No Exceptions.<br><br>
        -I Give Permission For My (Daughter’s) Picture And/Or Voice To Be Used In The Promotion Of This Program In Video,<br>
         &nbspIn Print And On The Internet.<br><br>
        -I Agree To Abide By All Rules And Guidelines Of The American Legion Auxiliary Georgia Girls State.<br>
         &nbspI Am Single And Have No Children.<br>
    
    </div>
</div>

<div class="buttonStudent">
    <button type="submit" class="buttonSubmit" color="black">Submit Form</button>

    <button type="submit" class="buttonSave" color="white">Save Form</button>

    <button type="submit" class="buttonNext" color="white" formaction="parentConsentForm.html">Next</button>

</div>
        </form>
    </div>
</div>

</div>
</body>
</html>