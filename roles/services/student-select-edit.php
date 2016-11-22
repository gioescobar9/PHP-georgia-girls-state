<?php

            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();

            $auxConnection=connectAuxDB();
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
        <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">
    </head>
    <body>
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                <a href = "../student-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home"><br>Home</span></a>
            <br>The American Legion Auxiliary<br>Georgia Girls State</h1>
                </div>
        <div class="container">
            <h3>Edit Forms</h3>
            <br>
            <div class="col-md-12" style="text-align:center;">
                <div class="col-md-6">
                <a href="student-edit-application-form.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="New Student Application">
                <span class="glyphicon glyphicon-user"><br>Edit<br>Student-Application</span>
            </a><br>
                </div>
                <div class="col-md-6">
            <a href="edit-parent-consent-form.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="Edit Previous Application or Consent Form">
                <span class="glyphicon glyphicon-pencil"><br>Edit<br>Parent-Consent-Form<span>
            </a><br>
                </div>
        </div>
    </body>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
          });
    </script>
</html>