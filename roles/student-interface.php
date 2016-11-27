<?php
session_start();
require_once "services/php-functions.php";

studentLoggedin();
//provide a interface for a student when they login
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
            <a href = "services/roles-logout.php"><span style = "float: right; margin-left: -20%; font-size:20px;" class = "btn 
                btn-primary">logout</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        <div class="logoImage"></div>
        </div>
        <div class="container">
            <h3>Student Task Bar</h3>
            <br>
            <div class="col-md-2"></div>
            <div class="col-md-10" style="text-align:center;">
                <div class="col-md-5">
                    <a href="services/student-application-status.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View Application Status">
                <span class="glyphicon glyphicon-file"><br>View<br>Application-Status</span>
            </a>
            <br>
                </div>
                
                <div class="col-md-5">
                    <a href="services/student-information.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View Your Personal Informaiton">
                <span class="glyphicon glyphicon-info-sign"><View><br>My-Information<br>&nbsp;</span>
            </a>
                <br>
            </div>
            </div>
        </div>
    </body>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
          });
    </script>
</html>