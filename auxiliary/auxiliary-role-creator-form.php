<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Initiate Accounts</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
    
</head>
<header>
<!-- create nav bar design, not complete yet just here for layout image-->
<nav class="navigation">
<div class="nav">
<ul class="topnav" id="myTopnav">
  <li><a class="active" href="auxiliary-role-creator-form.php">Initiate Student Account</a></li>
  <li><a href="#info">My Students</a></li>
  <!--<li><img src="georgiaLogo.jpg" id="logo" style="width:75px;height:75px;" /></li>-->
  <li><a class="#auxiliaryInfo" href="auxiliary-application-form.php">Auxiliary Information Form</a></li>
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
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">
<form class="form-horizontal" role="form">
    <div class="form-group">
           <h3>Initiate Student Account</h3>
           <legend>Student Information</legend>
            <div class="col-md-6">
            <label for = "studentFirstName">Student First Name:</label>
               <input type="text" class="form-control" id="studentFirstName" maxlength="25" pattern="[a-zA-Z]+" autofocus required><br>
           </div>
           <div class="col-md-6">
            <label for = "studentLastName">Student Last Name:</label>
               <input type="text" class="form-control" id="studentLastName" maxlength="25" pattern="[a-zA-Z]+"  required><br>
           </div>
           <div class="col-md-8">
            <label for = "studentEmail">Student Email:</label>
               <input type="text" class="form-control" id="studentEmail" maxlength="50"  placeholder="user@gmail.com" required><br>
           </div>
              <legend>School Information</legend>
            <div class="col-md-6">
            <label for = "schoolName">School Name:</label>
               <input type="text" class="form-control" id="schoolName" maxlength="30" pattern="[a-z A-Z]+" required><br>
           </div>
           <div class="col-md-6">
            <label for = "schoolEmail">School Email:</label>
               <input type="text" class="form-control" id="schoolEmail" maxlength="25" placeholder="user@gmail.com" required><br>
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
               <input type="text" class="form-control" id="officialSignature" maxlength="25" pattern="[a-z A-Z]+" placeholder="Electronic Signature" required><br>
           </div>
           <div class="col-md-4">
            <label for = "signatureDate">Date:</label>
               <input type="date" class="form-control" id="signatureDate"  required><br>
           </div>

           <div class="buttonStudent">
            <button type="submit" class="buttonSubmit">Submit</button>

            <button type="submit" class="buttonSave">Save</button><br>
           </div>

    </div>
</form>
</div>
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
    </script>
</body>
</html>