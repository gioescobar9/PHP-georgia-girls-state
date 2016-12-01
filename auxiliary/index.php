<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></<script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
</head>

<body>
  <div class="heading">
    <h1 align="center" class="loginHeader"><img src="images/icon.jpg"><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    <br>
  </div>
  <div class="form-group">
    <div class="well">
      <form id = "loginForm" action = "auxiliaryServices/auxiliary-login.php" method = "post" name = "auxiliary_login_form">
        <legend>Login</legend>
        
        <label class="control-label" for="username">Username:</label><br> 
        <input type="text"  id="unitNumber" placeholder="Unit Number" class="form-control" name = "username"><br>
    
        <label class="control-label" for="password">Password:</label><br>
        <input  type="password" passwordValidate id="password" placeholder="Password" class="form-control" name = "password"><br>

        <?php
            if(isset($_SESSION["loggedIn"])){
                if($_SESSION["loggedIn"] == false )
                echo "<div class = 'alert alert-danger'>Wrong Username or Password</div><br>";
            }
            
            if(isset($_SESSION["loggedOut"])){
              if($_SESSION["loggedOut"] == false)
                echo "<div class = 'alert alert-success'>You have logged out successfully</div>";
            }
            session_destroy();
        ?>
            
        <div class = "logInButtons">
          <input type="submit" class = "button btn-primary" color = "white" value = "Login">
          <a href = "create-auxiliary-account-form.php"> <input type="button" class="button btn-primary" color="white" value="Create Auxiliary Account" > </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>