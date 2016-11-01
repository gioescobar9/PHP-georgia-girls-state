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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>

<body>
    <div class="heading">
<h1 align="center" class="loginHeader"><img src="auxlogo.jpg"><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
<div class="logoImage">
</div>
    </div>
 <div class="form-group">
        <div class="well">
          <form>
            <legend>Login</legend>
            
            <label class="control-label" for="username">Username:</label><br> 
            <input type="email" ng-model="theEmail" id="inputEmail" maxlength="20" placeholder="Email" class="form-control"><br>
        
            <label class="control-label" for="password">Password:</label><br>
            <input  type="password" ng-model="thePassword" passwordValidate id="inputPassword" maxlength="20" placeholder="Password" class="form-control"><br>
            
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

