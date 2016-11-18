<?php

$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: ../auxiliary-main-interface.php");
} 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Auxiliary Application Information</title>
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
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
    
</head>

<body>

<header>
    <div class="heading">
        <h1 class="loginHeader"><img src="images/icon.jpg" alt = "logo">  
        <br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    </div>
</header>
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
    <div class="well">

        <form class="form-horizontal" name = "application" 
        action = 'auxiliaryServices/auxiliary-application.php' method = "post">
        <!-- here i will create a transparent input to pass along our application id -->
        <input type = "hidden" name = "appID" id = "appID" value = "<?php echo $id; ?>" />

            <div class="form-group">
                <h3>Auxiliary Information Form</h3>
                <legend>Auxiliary Information</legend>
                <div class="col-md-6">
                <label for = "unitNumber">Unit Number:</label>
                <input type="text" class="form-control" id="unitNumber" autofocus name = "unitNumber" required> 
            </div>
            <div class="col-md-6">
                <label for = "unitLocation">Unit Location:</label>
                <input type="text" class="form-control" id="unitLocation" maxlength="25" placeholder="Unit County" name = "unitCounty" required><br>
            </div>
            <div class="col-md-8">
                <label for = "unitStreetAddress">Street Address:</label>
                <input type="text" class="form-control" id="unitStreetAddress" maxlength="30" name = "unitAddress" required><br>
            </div>
            <div class="col-md-8">
                <label for = "unitCity">City,State,Zip:</label>
                <input type="text" class="form-control" id="unitCity" maxlength="30" placeholder="City,State,Zip" name = "unitCity" required><br>
            </div>
            <div class="col-md-6">
                <label for = "unitEmail">Email:</label>
                <input type="text" class="form-control" id="unitEmail" maxlength="50" placeholder="user@gmail.com" name = "unitEmail" required><br>
            </div>
            <div class="col-md-6">
                <label for = "unitPhone">Phone Number:</label>
                <input type="text" class="form-control" id="unitPhone" maxlength="15" placeholder="(555)888-0000" name = "unitPhone" required><br>
            </div>
            <div class="col-md-12">
                <legend>Auxiliary Sponsoring Official Information</legend>
            </div>
            <div class="col-md-6">
                <label for = "officialFirstName">First Name:</label>
                <input type="text" class="form-control" id="officialFirstName" maxlength="25" name = "officialFirstName" required><br>
            </div>
            <div class="col-md-6">
                <label for = "officialLastName">Last Name:</label>
                <input type="text" class="form-control" id="officialLastName" maxlength="25" name = "officialLastName" required><br>

            </div>
            <div class="col-md-6">
                <label for = "officialEmail">Official's Email:</label>
                <input type="text" class="form-control" id="officialEmail" maxlength="25" placeholder="user@gmail.com" name = "officialEmail" required><br>
            </div>
            <div class="col-md-6">
                <label for = "officialPhone">Official's Phone:</label>
                <input type="text" class="form-control" id="officialPhone" name="phoneNumber" maxlength="15" placeholder="(555)888-0000" 
                name = "officialPhone" required><br>
            </div>
            </div>

            <div class="buttonStudent">
                <input type = "submit" class = "buttonSubmit" 
                value = "Update Information">
            </div><br>
        
    </form>

    <div class = "buttonStudent">
                <a href = "auxiliary-main-interface.php"><button class="buttonSubmit">Exit Without Saving</button></a>
            </div>
</div>
</div>            


</body>
</html>