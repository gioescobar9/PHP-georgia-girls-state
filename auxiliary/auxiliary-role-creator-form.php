<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Application</title>
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
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
    
</head>
<header>
   <div class="heading">
<h1 align="center" class="loginHeader"><img src="images/icon.jpg">  
<br>The American Legion Auxiliary<br>Georgia Girls State</h1>
  </div>
</header>
<body>
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">


<form id= "role-creator-form" name = "role_creator_form" class="form-horizontal" 
 action = "auxiliaryServices/auxiliary-role-creator.php" method = "post">
    <div class="form-group">
           <h3>Initiate Student Account</h3>
           <legend>Student Information</legend>
            <div class="col-md-6">
            <label for = "studentFirstName">Student First Name:</label>
               <input type="text" class="form-control" id="studentFirstName" maxlength="25" pattern="[a-zA-Z]+" autofocus  name = "stuFirstName" required><br>
           </div>
           <div class="col-md-6">
            <label for = "studentLastName">Student Last Name:</label>
               <input type="text" class="form-control" id="studentLastName" maxlength="25" pattern="[a-zA-Z]+" 
               name = "stuLastName" required><br>
           </div>
           <div class="col-md-8">
            <label for = "studentEmail">Student Email:</label>
               <input type="text" class="form-control" id="studentEmail" maxlength="50"  placeholder="user@gmail.com" 
               name = "stuEmail" required><br>
           </div>
              <legend>School Information</legend>
            <div class="col-md-6">
            <label for = "schoolName">School Name:</label>
               <input type="text" class="form-control" id="schoolName" maxlength="30" pattern="[a-z A-Z]+" 
               name = "schName" required><br>
           </div>
           <div class="col-md-6">
            <label for = "schoolEmail">School Email:</label>
               <input type="text" class="form-control" id="schoolEmail" maxlength="25" placeholder="user@gmail.com" 
               name = "schEmail" required><br>
           </div>
           <legend>Official Agreement</legend>
           <div class="col-md-12">
           <div class="terms">
            <legend class="legendTerms">As the Sponsoring Official I confirm the Following by Signing Bellow:</legend>
                I certify that our Girls State Committee has met with the above named student and has selected her to be a representative of our Unit, 
                her High School and this Community at Georgia Girls State.  I further certify that the above named student has not previously 
                attended a Girls State Program.  Additionally, our American Legion Auxiliary Unit shall be responsible for paying the $260.00 
                fee and for arranging transportation to and from Georgia Girls State.3.	Reservations ($260.00 per girl) must reach the Department 
                headquarters, by April 30th. Applications should be completed by May 10th.
            </div><br>
           </div>

            <div class="col-md-8">
            <label for = "officialSignature">Official Signature:</label>

               <input type="text" class="form-control" id="officialSignature" maxlength="25" pattern="[a-z A-Z]+" placeholder="Electronic Signature" name = "officialSignature" required><br>
           </div>
           <div class="col-md-4">
            <label for = "signatureDate">Date:</label>
               <input type="date" class="form-control" id="signatureDate" name = "officialSignatureDate" required><br>
           </div>

           <div class="buttonStudent">
           <input type = "submit" class = "buttonSave" value = "Submit"><br>
            
           </div>

    </div>
</form>
  <div class = "buttonStudent">
    <a href = "auxiliary-main-interface.php"><button class="buttonSubmit">Cancel</button></a>
  </div>
</div>
</div>

</body>
</html>