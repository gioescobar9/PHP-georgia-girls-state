<!DOCTYPE html>
<html>
<head>
    <title>School Account Information</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
   
</head>

<body>

<header>
<!-- create nav bar design, not complete yet just here for layout image-->
<nav class="navigation">
<div class="nav">
<ul class="topnav" id="myTopnav">
  <li><a class="active" href="school.html">School Form</a></li>
  <li><a href="#info">My Information</a></li>
  <!--<li><img src="georgiaLogo.jpg" id="logo" style="width:75px;height:75px;" /></li>-->
  <li><a href="#students">My Students</a></li>
  <li><a href="#about">About</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
  <div class="logo"></div>
</ul>
</div>
</nav>
</header>
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">
<form class="form-horizontal" role="form">
    <div class="form-group">
        <h3>School Information Form</h3>
        <legend>School Details</legend>
        <div class="col-md-12">
            <label for = "schoolName">School Name: </label>
                <input type="text" class="form-control" id="schoolName" maxlength="50"" pattern="[a-zA-Z]+" required autofocus><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddressStreet">School Street:</label>
               <input type="text" class="form-control" id="schoolAddressStreet" maxlength="25" pattern="[a-zA-Z1-9.#-]+" required><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddress">City,State,Zip: </label>
                <input type="text" class="form-control" id="schoolAddress" maxlength="25" pattern="[a-zA-Z1-9-]+" placeholder="City,State,Zip" required><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolPhone"> School Phone Number: </label>
                <input type="text" class="form-control" id="schoolPhone" maxlength="15" pattern="[1-9-]+" required><br>
        </div>
        <legend>Student Information</legend>
        <div class="col-md-6">
            <label for = "studentFirstName">Student's First Name:</label>
               <input type="text" class="form-control" id="studentFirstName" maxlength="25" pattern="[a-zA-Z]+" autofocus><br>
        </div>
        <div class="col-md-6">
            <label for = "studentLastName">Student's Last Name:</label>
               <input type="text" class="form-control" id="studentLastName" maxlength="25" pattern="[a-zA-Z]+" required><br>
        </div>
        <div class="col-md-6">
            <label for = "studentRank">Class Rank:</label>
               <input type="text" class="form-control" id="studentLastName" maxlength="3" pattern="[1-9]+" required><br>
        </div>
        <div class="col-md-6">
            <label for = "studentGradDate">Expected Graduation Date:</label>
               <input type="date" class="form-control" id="studentGradDate" required><br>
        </div>
        <legend>School Official Information </legend>
        <div class = "col-md-6">
            <label for = "officialFirstName"> First Name: </label>
                <input type="text" class="form-control" id="officialFirstName" maxlength="25" pattern="[a-zA-Z]+" required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialLastName"> Last Name: </label>
                <input type="text" class="form-control" id="officialLastName" maxlength="25" pattern="[a-zA-Z]+" required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialPhone"> Official Phone Number: </label>
                <input type="text" class="form-control" id="officialPhone" maxlength="15" pattern="[1-9-()]+" placeholder="(888)555-0000"required><br>
        </div>
        <div class="col-md-6">
            <label for = "officialEmail"> Official Email: </label>
                <input type="email" class="form-control" id="officialEmail" maxlength="50"  required><br>
        </div>
        <div class="col-12-md">
        <legend>Authorization</legend>
        </div>
        <div class="col-md-6">
            <label for = "officialSignature"> Please Sign to Agree to the Following Terms: </label>
                <input type="text" class="form-control" id="officialSignature" maxlength="15" pattern="[a-zA-Z]+" placeholder="Electronic Signature"required><br>
        </div>
        <div class="col-md-6">
            <label for = "signDate">Date:</label>
                <input type="date" class="form-control" id="signDate" placeholder="mm/dd/yyyy"required><br>
        </div>
        <div class="col-md-12">
        <div class="terms">
            <legend class="legendTerms">CONFIRM THE FOLLOWING:</legend>
        <div class="agreementHeading">I certify that the above named student will meet the following criteria as of June of the program year.<br></div>
	    -Be At Least 14 Years of Age.<br>
	    -Should Successfully Have Completed Her Junior Year And Have At Least One Semester Remaining Before
         &nbspGraduation.<br>
	    -Displays Outstanding Qualities of Leadership, Character, Scholarship, Loyalty and Service To The School And
         &nbspCommunity.<br>
	    -Is In The Upper Third Of Their Class.  Exceptions Must Be Approved In Advance By The Director, Georgia Girls State.<br>
        </div>
        </div>
    </div>
        
        <div class="buttonStudent">
            <button type="submit" class="buttonSubmit" color="black">Submit Form</button>

            <button type="submit" class="buttonSave" color="white">Save Form</button>
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
