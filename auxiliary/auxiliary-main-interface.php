<?php
session_start();
// the button we make in order to start the applicatoin process wil
// be wrapped in a form, that way itll send us to a service that will make queries in order to send all info we need to send to the database
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auxiliary</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
</head>

<body>

    <div class="heading">
<h1 align="center" class="loginHeader"><img src="images/icon.jpg"> 
<a href = "auxiliaryServices/auxiliary-logout.php"><span style = "float: right; margin-left: -20%" class = "btn btn-primary">logout</span></a> 
<br>The American Legion Auxiliary<br>Georgia Girls State</h1>
	</div>

<div class="container">
  <h3>Auxiliary Task Bar</h3>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Start New Application</a></li>
    <li><a data-toggle="pill" href="#menu1">My Applications</a></li>
    <li><a data-toggle="pill" href="#menu2">My Information</a></li>
  </ul>
  
  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
      <h2>Start A New Application</h2>
      <p>Here you may Initiate a new Application for a student, provided that you have both the student and schools information. After initiating the application, both the student and the school will recive e-mails with links to the application. </p> <br>
      <a href = "auxiliary-role-creator-form.php"><button>Click here to start a new Application</button></a>
    </div>

    <div id="menu1" class="tab-pane fade">
      <h2>My Applications</h2>
      <p>we will create a table here will applications along with an edit and delete button on all of them</p>
    </div>

    <div id="menu2" class="tab-pane fade">
      <h2>My Information</h2>
      <p>Here i should be able to view all my personal information along . add  an edit button , that wil take you to an update info page</p>
    </div>
  </div>
</div>

</body>
</html>

