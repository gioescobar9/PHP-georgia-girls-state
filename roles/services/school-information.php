<?php
        
            session_start();
        if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
        if(!isset($_SESSION["schoolLoggedIn"])){
            header('location: index.php');
        }
            require_once 'connectAuxDB.php';
            $schoolID = $_COOKIE['schoolID'];

            $auxConnection=connectAuxDB();
        
            $query = "SELECT schoolName,schoolEmail FROM school WHERE schoolID='$schoolID'";
            
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $rows = $result->num_rows;
        
        ?>
<html></html>
    <head>
        <title>School Information</title>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">
    </head>
    <body>
         <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "..//school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1></a>
                </div>
        <div class="container">
            <h3>School Information</h3>
            <?php
            echo "<div class='container'>";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th style='text-align:center;'>School Name</th>";
				echo "<th style='text-align:center;'>School Email Address</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
    
for($i = 0;$i<$rows;$i++){
    $result->data_seek($i);
    $record = $result->fetch_array(MYSQLI_ASSOC);
    
    $schoolName = $record["schoolName"];
    $schoolEmail = $record["schoolEmail"];
    
    
    echo "<tr>";
        echo "<td style='text-align:center; background-color:lightgray;'> $schoolName </td>";
        echo "<td style='text-align:center; background-color:lightgray;'> $schoolEmail </td>";
        echo "<td style='text-align:center; background-color:lightgray;'><a class = 'btn' href = 'school-edit-information.php?id=".$schoolID."'><span class='glyphicon glyphicon-edit' </span>Update</a></td>";
  echo "</td>";
    echo"</tr>";
 }

    echo "</tbody>";
echo "</table>";
echo "</div>";
            ?>
    </body>
</html>