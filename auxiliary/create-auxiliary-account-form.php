<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
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
    <div class="logoImage"></div>
</div>

<div class = "container">
    <div class = "well">
    <form id = "loginForm" action = "auxiliaryServices/create-auxiliary-account.php" method = "post" 
    name = "create_auxiliary_account_form">
      <div class="form-group">
        
            <legend>Create Auxiliary Account</legend>
            
            <label for = "username:">Username:</label><br>
            <input type="text" class="form-control" id="username"  
              name = "username" id="unitNumber" placeholder="Unit Number" required><br>

             <label for = "auxEmail">Auxiliary Email: </label><br>
            <input  type="email"  id ="auxEmail" 
            name = "email" class="form-control" required><br>

            
                 <label for = "password">Password: </label><br>
                <input  type="password"  id ="password" 
                name = "password" class="form-control" required><br>

                <label for = "confirm_password">Confirm Password: </label><br>
                <input type="password" id = "confirmPassword" class="form-control" required>
            <br>

            <?php
                if(isset($_SESSION["auxExist"])){
                    if($_SESSION["auxExist"] == true )
                    echo "<div class = 'alert alert-danger'>This Auxiliary account already exist</div><br>";
                }
                
                session_destroy();

            ?>


            <p>
               <input type="submit" class="button btn-primary" color="white" value = "Create Account">
            </p>
    
      </div>

    </form>
<div class = "buttonStudent">
                <a href = "index.php"><button class="buttonSubmit">Cancel</button></a>
    </div>
    </div>

</div>


<!-- password validation here -->
<script>
    
</script>

</body>
</html>