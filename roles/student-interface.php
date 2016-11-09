<?php
   session_start(); 
?>

<html>
    <head>
        <title>Student Account</title>
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
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="images/icon.jpg">
            <a href = "services/logout.php"><span style = "float: right; margin-left: -20%" class = "btn 
                btn-primary">logout</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        <div class="logoImage"></div>
        </div>
        <div class="container">
            <h3>Student Task Bar</h3>
            <div class="col-md-2">
            </div>
            <div class="col-md-10" style="text-align:center;">
                <div class="col-md-3">
                <a href="student-application-form.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-user"><br>New<br>Application</span>
            </a>
                </div>
                <div class="col-md-3">
            <a href="student-application-form.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-pencil"><br>Edit<br>Application</span>
            </a>
                </div>
                <div class="col-md-3">
            <a href="student-application-form.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-info-sign"><br>Auxiliary<br>Information</span>
            </a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>