<?php
session_start();
if(!isset($_SESSION["adminLoggedIn"])){
  header('location: index.php');
}

require_once 'auxiliaryConnectDB.php';
require_once 'adminFunc.php';
require_once 'AdminCrudTable.php';
?>

<html>
    <head>
        <title>Admin</title>
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
            <a href = "administrator-logout.php"><span style = "float: right; margin-left: -20%; font-size:20px;" class = "btn 
                btn-primary">logout</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        <div class="logoImage"></div>
        </div>
        <div class="container">

            <h3>Student Application Status</h3>         
                <?php createAdminCrudTable(); ?>
          <h3>Application Reset</h3>
        <div class = "alert alert-warning" style = "text-align: center;"><span style = "color: crimson; font-size: 1.3em;">Warning!: Reseting will delete all existing application information. This should only be used when starting a new Applicant Year</span> <div style = "text-align: center;"><a class = "btn reset alert alert-danger" href = "admin-reset.php">RESET</a></div></div>

        <h3>Applicant Group Creator</h3>
        <?php createSortTable(); ?>
        <br>
        </div>
</body>
<script>
$('.reset').click(function(){return confirm('Are you sure you want to RESET?');});
</script>

</html>