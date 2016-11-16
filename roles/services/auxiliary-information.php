<?php
session_start();
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
if(!isset($_SESSION["loggedIn"])){
  header('location: index.php');
}
if (!isset($_SESSION["schoolLoggedIn"])){
        $variable = "../student-interface.php";
}
else if (!isset($_SESSION["studentLoggedIn"])){
        $variable = "../school-interface.php";
    }

$query = "SELECT unitNumber,auxEmail FROM auxiliary WHERE auxiliaryID = '1';";

$result = $auxConnection->query($query);
if(!$result) die("query failed ".$auxConnection->error);

$rows = $result->num_rows;
?>
<html>
<head>
    <title>Parent Consent Form</title>
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
            <a href = "<?php echo $variable ?>"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
        </div>
            <br>
</header>
</html>
<?php
echo "<div class='container'>";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th style='text-align:center;'>Auxiliary Unit Number</th>";
				echo "<th style='text-align:center;'>Auxiliary Email Address</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
    
for($i = 0;$i<$rows;$i++){
    $result->data_seek($i);
    $record = $result->fetch_array(MYSQLI_ASSOC);
    $unitNumber = $record["unitNumber"];
    $unitEmail = $record["auxEmail"];
    echo "<tr>";
        echo "<td style='text-align:center; background-color:lightgray;'> $unitNumber </td>";
        echo "<td style='text-align:center; background-color:lightgray;'> $unitEmail </td>";
    echo"</tr>";
 }

    echo "</tbody>";
echo "</table>";
echo "</div>";
 ?>   
