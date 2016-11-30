<?php
    
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
        <link rel="stylesheet" type="text/css" href="administratorStyleSheet.css">
    </head>
    <body>
         <div class="heading">
            <h1 align="center" class="loginHeader"><img src="../roles/images/icon.jpg">
            <a href = "administrator-logout.php"><span style = "float: right; margin-left: -20%" class = "btn 
                btn-primary">logout</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        <div class="logoImage"></div>
        </div>
        <div class="container">
            <h3>Administrator Task Bar</h3>
            <br>
            <div class="col-md-12" style="text-align:center;">
                <div class="col-md-3">
                <a href="administrator-profile.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View/Edit Administrator Profile Information">
                <span class="glyphicon glyphicon-user"><br>Administrator<br>profile</span>
            </a>
                </div>
                <div class="col-md-3">
                <a href="administration-view-applications.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="View Current Applications and Status">
                <span class="glyphicon glyphicon-pencil"><br>View<br>Applications</span>
            </a>
                </div>
                <div class="col-md-3">
                <a href="administrator-student-information-display.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="Individual Student Information">
                <span class="glyphicon glyphicon-list-alt"><br>View<br>Students</span>
            </a>
                </div>
                <div class="col-md-3">
                <a href="administrator-update-payment.php" class="btn btn-info btn-lg" data-toggle="tooltip" title="Update Payment Status">
                <span class="glyphicon glyphicon-info-sign"><br>Update<br>Payment</span>
            </a>
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