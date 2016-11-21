<?php
session_start();
if(!isset($_SESSION["loggedIn"])){
  header('location: index.php');
}
if(!isset($_SESSION["schoolLoggedIn"])){
    header('location: index.php');
}

$schoolID = $_COOKIE['schoolID'];
?>

<html>

<head>
    <title>School Account Information</title>
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
    <link rel="stylesheet" type="text/css" href="css/rolesStyleSheet.css">
   
</head>

<body>

<header>
    <div class="heading">
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="images/icon.jpg">
            <a href = "school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    </div>
</header>
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">
<?php 
    echo "<form class='form-horizontal' role='form' action='services/school-application-form-action.php?id=".$schoolID."' method='post'>";
?>

    <div class="form-group">
        <h3>School Information Form</h3>
        <legend>School Details</legend>
        <div class="col-md-12">
            <label for = "schoolName">School Name: </label>
                <input type="text" class="form-control" name="schoolName" maxlength="50" required autofocus><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddressStreet">School Street:</label>
               <input type="text" class="form-control" name="schoolAddressStreet" maxlength="25" required><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddress">City,State,Zip: </label>
                <input type="text" class="form-control" name="schoolAddress" maxlength="25" placeholder="City,State,Zip" required><br>
        </div>
        <div class="col-md-12">
            <label for = "schoolPhone"> School Phone Number: </label>
                <input type="text" class="form-control" name="schoolPhone" maxlength="15" placeholder= "((555)888-0000" required><br>
        </div>
        <div class = "col-md-12">
        <legend>Student Information</legend>
        </div>
        <div class="col-md-6">
            <label for = "studentFirstName">Student's First Name:</label>
               <input type="text" class="form-control" name="studentFirstName" maxlength="25" autofocus><br>
        </div>
        <div class="col-md-6">
            <label for = "studentLastName">Student's Last Name:</label>
               <input type="text" class="form-control" name="studentLastName" maxlength="25" required><br>
        </div>
        <div class="col-md-6">
            <label for = "studentRank">Class Rank:</label>
               <input type="text" class="form-control" name="studentRank" maxlength="3" required><br>
        </div>
        <div class="col-md-6">
            <label for = "studentGradDate">Expected Graduation Date:</label>
               <input type="date" class="form-control" name="studentGradDate" required><br>
        </div>
        <div class = "col-md-12">
        <legend>School Official Information </legend>
        </div>
        <div class = "col-md-6">
            <label for = "officialFirstName">Official's First Name: </label>
                <input type="text" class="form-control" name="officialFirstName" maxlength="25" required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialLastName">Official's Last Name: </label>
                <input type="text" class="form-control" name="officialLastName" maxlength="25" required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialPhone"> Official Phone Number: </label>
                <input type="text" class="form-control" name="officialPhone" maxlength="15" placeholder="(888)555-0000"required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialEmail"> Official Email: </label>
                <input type="email" class="form-control" name="officialEmail" maxlength="50"  required><br>
        </div>
        <div class="col-12-md">
        <legend>Authorization</legend>
        </div>
        <div class="col-md-6">
            <label for = "officialSignature"> Please Sign to Agree to the Following Terms: </label>
                <input type="text" class="form-control" name="officialSignature" maxlength="15" placeholder="Electronic Signature"required><br>
        </div>
        <div class="col-md-6">
            <label for = "signDate">Date:</label>
                <input type="date" class="form-control" name="signDate" placeholder="mm/dd/yyyy"required><br>
        </div>
        <div class="col-md-12">
        <div class="terms">
            <legend class="legendTerms">CONFIRM THE FOLLOWING:</legend>
        <div class="agreementHeading">I certify that the above named student will meet the following criteria as of June of the program year.<br></div>
	    -Be At Least 14 Years of Age.<br>
	    -Should Successfully Have Completed Her Junior Year And Have At Least One Semester Remaining Before
         &nbsp Graduation.<br>
	    -Displays Outstanding Qualities of Leadership, Character, Scholarship, Loyalty and Service To The School And
         &nbsp Community.<br>
	    -Is In The Upper Third Of Their Class.  Exceptions Must Be Approved In Advance By The Director, Georgia Girls State.<br>
        </div>
        </div>
    </div>
        
        <div class="buttonStudent">
            <button type="submit" class="buttonSubmit" color="black">Submit Form</button>

            
    </div>
    
</form>

</div>
</div>

</body>
</html>
