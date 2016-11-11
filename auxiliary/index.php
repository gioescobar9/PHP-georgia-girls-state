<?php
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></<script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>

<body>
    <div class="heading">
<h1 align="center" class="loginHeader"><img src="images/icon.jpg"><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
<div class="logoImage">
</div>
    </div>
 <div class="form-group">
        <div class="well">
          <form name="login">
            <legend>Login</legend>
            
            <label class="control-label" for="username">Username:</label><br> 
            <input type="input" id="username" name="unitNumber" maxlength="20" placeholder="Unit Number" class="form-control" required><br>
        
            <label class="control-label" for="password">Password:</label><br>
            <input  type="password" id="password" name="password" maxlength="20" placeholder="Password" class="form-control" required><br>
            
              <div class = "logInButtons">
              <button type="submit" class="button btn-primary" color="white">Submit</button>
              <button type="button" class="button btn-primary" color="white" ng-click = "">Create Auxillary Account</button>
            </div>
          </form>
      </div>
    </div>

</form>
</div>
</div>
</body>
</html>

