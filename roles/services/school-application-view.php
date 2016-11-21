<?php
        
            session_start();
        if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
        if(!isset($_SESSION["schoolLoggedIn"])){
            header('location: index.php');
        }
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        
            $schoolID = $_COOKIE['schoolID'];
            
            
            $query = "SELECT * FROM student WHERE schoolID= '$schoolID';";
            
            $result = $auxConnection->query($query);
            if(!$result) die("query failed ".$auxConnection->error);

            $rows = $result->num_rows;
?>
<html>
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
        <body>
            <header>
   
                <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "..//school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1></a>
                </div>
            <br>
            </header>
        <h3>View/Update Applications</h3>
        <?php
echo "<div class='container'>";
	echo "<table class = 'table table-striped'>";
        echo "<legend>School Applications</legend>";  
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Student Name</th>";
				echo "<th>Status</th>";
				echo "<th>Options</th>";
			echo "</tr>";
        
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
  $result->data_seek($i);
  $record = $result->fetch_array(MYSQLI_ASSOC);
 $studentID = $record["studentID"];
 $studentName = $record["firstName"]." ".$record["lastName"];
 $status = getStatus($studentID);

    echo"$status";
 if($status == "Incomplete")
  $statusRow = "<td class = 'alert alert-warning'>".$status."</td>";
else
  $statusRow = "<td class = 'alert alert-success'>".$status."</td>";
 
 echo "<tr>";
  echo "<td>".$studentID."</td>";
  echo "<td>".$studentName."</td>";
  echo "<td>".$statusRow."</td>";
  echo "<td> 
  <a class = 'btn' href = 'school-edit-application.php?id=".$studentID."'><span class='glyphicon glyphicon-edit'></span>Update</a>
  </td>";
  echo "<td><a class = 'btn' href = 'school-application-form.php?id=".$studentID."'><span class='glyphicon glyphicon-pencil'></span>New Application for Student</a></td>";
 echo "</tr>";
}// end of for loop

		echo "</tbody>";
	echo "</table>";
echo "</div>"; 
            
function getStatus($studID){
  $auxConnection = connectAuxDB();
  $query = "SELECT studentInfoComplete FROM applications WHERE studentID = '$studID';";
  $result = $auxConnection->query($query);
  if(!$result) die("getStatus query failed".$auxConnection->error);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row["studentInfoComplete"] == 0 )
      $toReturn = "Incomplete";
    else
      $toReturn = "Complete";
  }
  else
    $toReturn = "0 results";

closeConnection($auxConnection);
return $toReturn; 

}
?>    
    </body>
</html>