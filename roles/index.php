<?php
session_start();
//this form is the login form which forwards the input tp an action form to interpret the input
?>

<html>
<head>
    <title>Login</title>
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
    <div class="heading">
<h1 align="center" class="loginHeader"><img src="images/icon.jpg"><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
<div class="logoImage">
</div>
    </div>

<div class="loginContainer">
<div class="well">
<form class="form-horizontal" name = "login" role="form" action="services/roles-login-action.php" method = "post">
    <legend>Login</legend>
    <div class="col-md-12">
        <div class="col-md-12">
            <label for = "Username:">Username:</label><br>

                <input type="email" class="form-control" name ="username" maxlength="50"  placeholder="Your Email" required>
                <br>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <label for = "password">Password: </label><br>
                <input  type="password" class="form-control" name="password" maxlength="20" placeholder="Password" required><br>
            <?php
                if(isset($_SESSION["loggedIn"])){
                    if($_SESSION["loggedIn"]==false )
                        echo "<div class = 'alert alert-danger'>Wrong Username or Password</div> <br>";
                }
                session_destroy();
            ?>
        </div>
        </div>
     
        <div class="buttonStudent">
         <button type="submit" class="buttonSubmit" color="white">Login</button>
        </div>
    </div>
</form>
</div>
</div>
</body>
</html>

