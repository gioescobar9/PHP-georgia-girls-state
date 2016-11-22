<?php
session_start();
require_once "services/php-functions.php";
schoolLoggedIn();
?>

<html>
    <head>
        <title>School Account</title>
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
            <h3>School Task Bar</h3>
            <br>
            <div class="col-md-3"></div>
            <div class="col-md-8" style="text-align:center;">
                <div class="col-md-4">
                <a href="services/school-information.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View/Update School Information">
                <div class="user">
                <span class="glyphicon glyphicon-user"><br>School<br>Information</span>
                </div>
            </a>
                </div>
                <!--
                <div class="col-md-3">
                <a href="school-application-form.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="Complete New Application">
                <span class="glyphicon glyphicon-pencil"><br>New<br>Application</span>
            </a><br>
                </div>-->
                <div class="col-md-4">
                <a href="services/school-application-view.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View/update new and previous applications">
                <span class="glyphicon glyphicon-list-alt"><br>View/Edit<br>Applications</span>
            </a><br>
                </div>
                <!--<div class="col-md-3">
                <a href="services/auxiliary-information.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View your Auxiliary Information">
                <span class="glyphicon glyphicon-info-sign"><br>Auxiliary<br>Information</span>
            </a><br>-->
                </div>
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