<?php
        
            session_start();
            require_once 'php-functions.php';
            schoolLoggedIn();
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        
            $schoolID = $_COOKIE["schoolID"];
            
            //retrieve school info from the school table and allow email and name to be updated
            $query = "SELECT schoolName,schoolEmail FROM school WHERE schoolID= '$schoolID';";
            
            $result = $auxConnection->query($query);
            if(!$result) die("query failed ".$auxConnection->error);

            $rows = $result->num_rows;

            $info = mysqli_fetch_assoc($result);
?>
<html>
    <body>
        <head>
                <title>Edit Applications</title>
                <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
                <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <script src="jquery-1.12.4.min.js"></script>
                <script src="js/form-validation.js"></script>
                <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">

        </head>
            <header>
   
                <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "../school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
                </div>
            <br>
            </header>
            <div class="container">
                <div class="well">
                    <h3>Update Information</h3>
                    
                     
                
                    <form class="form-horizontal" role="form" action="school-edit-information-action.php" method="post"></form>
                        <div class="form-group">
                            
                          <div class="col-md-6">
                            <label for = "schoolName">School Name: </label>
                                <input type="text" class="form-control" name="schoolName" maxlength="50" required autofocus value="<?php echo $info["schoolName"];?>">
                              <br>
                        </div>
                        <div class="col-md-6">
                            <label for = "schoolEmail">School Email Address:</label>
                                <input type="text" class="form-control" name="schoolEmail" maxlength="50" required value="<?php echo $info["schoolEmail"];?>"><br>
                        </div>
                            
                        </div>
                         <div class="buttonStudent">

                            <button type="submit" class="buttonSave" color="white">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        
    </body>
</html>