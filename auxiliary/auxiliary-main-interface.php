<?php
session_start();
if(!isset($_SESSION["loggedIn"])){
  header('location: index.php');
}
require_once 'auxiliaryServices/auxiliaryCrudTable.php';
// the button we make in order to start the applicatoin process wil
// be wrapped in a form, that way itll send us to a service that will make queries in order to send all info we need to send to the database
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auxiliary</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/auxiliaryStyleSheet.css">
</head>

<body>
 
    <div class="heading">
<h1 align="center" class="loginHeader"><img src="images/icon.jpg"> 
<a href = "auxiliaryServices/auxiliary-logout.php"><span style = "float: right; margin-left: -20%; font-size:20px;" class = "btn btn-primary">logout</span></a> 
<br>The American Legion Auxiliary<br>Georgia Girls State</h1>
	</div>

<div class="container">
  <h3>Auxiliary Task Bar</h3>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Start New Application</a></li>
    <li><a data-toggle="pill" href="#menu1">My Applications</a></li>
    <li><a data-toggle="pill" href="#menu2">My Information</a></li>
  </ul>
    
  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
      <h2 style='text-align:center;'>Start A New Application</h2>
      <p>Here you may Initiate a new Application for a student, provided that you have both the student and schools information. After initiating the application, both the student and the school will recive e-mails with links to the application. </p> <br>
      <a href = "auxiliary-role-creator-form.php"><button>Click here to start a new Application</button></a>
    </div>

    <div id="menu1" class="tab-pane fade">
      <h2 style ='text-align:center;'>My Applications</h2>
      <?php createCrudTable(); ?>
    </div>

    <div id="menu2" class="tab-pane fade">
      <h2 style = 'text-align:center;'>My Information</h2>
        <?php
echo "<div class='container'>";
	echo "<table class = 'table'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th style='text-align:center;'>Auxiliary Unit Number</th>";
				echo "<th style='text-align:center;'>Auxiliary Email</th>";
                echo "<th style='text-align:center;'>Action</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
//echo a table that contains the students information  

    $unitNumber = $_COOKIE["unitNumber"];
    $auxiliaryEmail = $_COOKIE["auxiliaryEmail"];
    echo "<tr>";
        echo "<td style='text-align:center; background-color:lightgray;'> $unitNumber </td>";
        echo "<td style='text-align:center; background-color:lightgray;'> $auxiliaryEmail </td>";
        echo "<td style ='text-align:center; backgorunf-color: lightgray;'><a class = 'btn' href = 'auxiliaryServices/update-aux-profile.php'><span class='glyphicon glyphicon-edit'></span>Update Info</a></td>";
    echo"</tr>";
 

    echo "</tbody>";
echo "</table>";
echo "</div>";
 ?>
    </div>
  </div>
</div>

</body>
</html>