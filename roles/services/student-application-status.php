<?php
            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();

            $auxConnection=connectAuxDB();
        
            //get the studentID
            $studentID = $_COOKIE['studentID'];
            
            //query the student table based on the studentID
            $query = "SELECT * FROM student WHERE studentID= '$studentID';";
            
            $result = $auxConnection->query($query);
            if(!$result) die("query failed ".$auxConnection->error);

            $rows = $result->num_rows;
?>
<html>
     <head>
                <title>View Application</title>
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
        <body>
            <header>
   
                <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "../student-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1></a>
                </div>
            <br>
            </header>
        <h3>View/Update Application</h3>
        <?php
echo "<div class='container'>";
	echo "<table class = 'table table-striped'>";
        echo "<legend>My Application</legend>";  
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Application</th>";
                echo "<th>Consent Form</th>";
				echo "<th>Application Options</th>";
                echo "<th>Consent Options</th>";
			echo "</tr>";
        
		echo "</thead>";
    echo "<tbody>";
//create a table to see the status of the forms that the student needs to fill out
for($i = 0;$i<$rows;$i++){
    $result->data_seek($i);
    $record = $result->fetch_array(MYSQLI_ASSOC);
    $studentID = $record["studentID"];
    $studentName = $record["firstName"]." ".$record["lastName"];
    $applicationStatus = getAppStatus($studentID);
    $consentStatus = getConsentStatus($studentID);


    if($applicationStatus == "Incomplete")
        $statusRowApp = "<td class = 'alert alert-warning'>".$applicationStatus."</td>";
    else
        $statusRowApp = "<td class = 'alert alert-success'>".$applicationStatus."</td>";
    
    if($consentStatus == "Incomplete")
        $statusRowConsent = "<td class = 'alert alert-warning'>".$consentStatus."</td>";
    else
        $statusRowConsent = "<td class = 'alert alert-success'>".$consentStatus."</td>";
 
    echo "<tr>";
    echo "<td>".$studentID."</td>";
    echo "<td>".$studentName."</td>";
    echo "$statusRowApp";
    echo "$statusRowConsent";
//check to see if the student has completed the application, if they have then mark as complete
//else mark as incomplete
    if($applicationStatus == "Complete"){
        echo "<td> 
        <a class = 'btn' href = 'student-edit-application-form.php'><span class='glyphicon glyphicon-edit'></span>Update Application</a>
        </td>";
    }
    
    else{
        echo "<td><a class = 'btn' href = '../student-application-form.php'><span class='glyphicon glyphicon-pencil'></span>Start Application</a></td>";
    }
//check to see if the parent consent form is complete if it is mark as complete, else mark incomplete
    if($consentStatus == "Complete"){
        echo "<td> 
        <a class = 'btn' href = 'edit-parent-consent-form.php'><span class='glyphicon glyphicon-edit'></span>Update Consent Form</a>
  </td></tr>";
    }
    
    else{
        echo "<td><a class = 'btn' href = '../parent-consent-form.php'><span class='glyphicon glyphicon-pencil'></span>Start Consent Form</a></td>";
        echo "</tr>";
    }
}// end of for loop

		echo "</tbody>";
	echo "</table>";
echo "</div>"; 
            

?>    
    </body>
</html>