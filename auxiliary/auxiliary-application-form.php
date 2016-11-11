<?php 
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></<script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
    
</head>
<header>
<!-- create nav bar design, not complete yet just here for layout image-->
<nav class="navigation">
<div class="nav">
<ul class="topnav" id="myTopnav">
  <li><a class="active" href="auxiliaryInfo.html">Auxiliary Form</a></li>
  <li><a href="#info">My Information</a></li>
  <!--<li><img src="georgiaLogo.jpg" id="logo" style="width:75px;height:75px;" /></li>-->
  <li><a class="#schools" href="#schools">My Schools</a></li>
  <li><a href="#students">My Students</a></li>
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
<form class="form-horizontal" role="form" name="application">
    <div class="form-group">
           <h3>Auxiliary Information Form</h3>
           <legend>Auxiliary Information</legend>
            <div class="col-md-6">
            <label for = "unitNumber">Unit Number:</label>
                <input type="text" class="form-control" id="unitNumber" maxlength="10" autofocus required> 
            </div>
            <div class="col-md-6">
            <label for = "unitLocation">Unit Location:</label>
                <input type="text" class="form-control" id="unitLocation" name="schoolName" maxlength="25" placeholder="Unit County" required>
            </div>
            <div class="col-md-8">
            <label for = "unitStreetAddress">Street Address</label>
                <input type="text" class="form-control" id="unitStreetAddress" name="address" maxlength="30" required>
            </div>
            <div class="col-md-8">
            <label for = "unitCity">City,State,Zip:</label>
                <input type="text" class="form-control" id="unitCity" name="address" maxlength="30" placeholder="City, State, Zip" required>
            </div>
            <div class="col-md-6">
            <label for = "unitEmail">Email:</label>
                <input type="text" class="form-control" id="unitEmail" maxlength="50" placeholder="user@gmail.com" required>
            </div>
            <div class="col-md-6">
            <label for = "unitPhone">Phone Number:</label>
                <input type="text" class="form-control" id="unitPhone" name="phoneNumber" maxlength="15" placeholder="(555)888-0000" required>
            </div>
            <legend>Auxiliary Sponsoring Official Information</legend>
            <div class="col-md-6">
            <label for = "officialFirstName">First Name:</label>
                <input type="text" class="form-control" id="officialFirstName" name="name" maxlength="25" required>
            </div>
            <div class="col-md-6">
            <label for = "officialLastName">Last Name:</label>
                <input type="text" class="form-control" id="officialLastName" name="name" maxlength="25" required>
            </div>
            <div class="col-md-6">
            <label for = "officialEmail">Official's Email:</label>
                <input type="text" class="form-control" id="officialEmail" maxlength="25" placeholder="user@gmail.com" required>
            </div>
            <div class="col-md-6">
            <label for = "officialPhone">Official's Phone:</label>
                <input type="text" class="form-control" id="officialPhone" name="phoneNumber" maxlength="15" placeholder="(555)888-0000" required><br>
            </div>
            <div class="buttonStudent">
                <button type="submit" class="buttonSubmit" color="black">Update Information</button>

                <button type="submit" class="buttonSave" color="white">Exit Without Saving</button>
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
    </script>v
</body>
</html>