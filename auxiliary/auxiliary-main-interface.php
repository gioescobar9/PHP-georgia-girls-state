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






</body>
</html>

