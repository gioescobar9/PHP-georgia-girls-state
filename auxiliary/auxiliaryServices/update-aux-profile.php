<?php
session_start();
if(!isset($_SESSION["loggedIn"])){
  header('location: index.php');
}
require_once 'auxiliaryConnectDB.php';
$auxConnection= connectAuxDB();
$auxID = $_COOKIE['auxiliaryID'];

//insert new updated info
if(isset($_POST['updatedNumber']) && isset($_POST['updatedEmail'])){
	$message = true;
	$updatedNumber = $_POST['updatedNumber'];
	$updatedEmail = $_POST['updatedEmail'];
	$updatedPass = $_POST['updatedPass'];
	$query = "UPDATE auxiliary SET unitNumber = '$updatedNumber', auxEmail = '$updatedEmail', password = '$updatedPass' WHERE auxiliaryID = '$auxID';";
	$result = $auxConnection->query($query);
	if(!$result) die("query2 failed".$auxConnection->error);

	//update our user cookies we'll have to reset them
	setcookie("unitNumber", NULL, time()-86400);
	setcookie("auxiliaryEmail", NULL, time()-86400);

	setcookie("unitNumber",$updatedNumber, time() + 86400, "/");
	setcookie("auxiliaryEmail",$updatedEmail, time() + 86400, "/");
}

//retrieve existing auxiliary info
$query = "SELECT unitNumber, auxEmail, password FROM auxiliary WHERE  auxiliaryID = '$auxID';";
$result = $auxConnection->query($query);
if(!$result) die("query1 failed".$auxConnection->error);
$record = $result->fetch_assoc();
$auxProfile = array(
	'unitNumber' => $record['unitNumber'],
	'auxEmail' => $record['auxEmail'],
	'auxPass' => $record['password']
	);


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
    <link rel="stylesheet" type="text/css" href="../css/auxiliaryStyleSheet.css">
</head>

<body>

    <div class="heading">
<h1 align="center" class="loginHeader"><img src="../images/icon.jpg"> 
<a href = "auxiliaryServices/auxiliary-logout.php"><span style = "float: right; margin-left: -20%" class = "btn btn-primary">logout</span></a> 
<br>The American Legion Auxiliary<br>Georgia Girls State</h1>
	</div>

<div class="container">
	<div class= "well">
	<h3>Update Auxiliary Profile</h3>
  <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<div class="form-group">
      <label for="auxNumber">Auxiliary Number:</label>
      <input type="text" class="form-control" name = "updatedNumber" value = "<?php echo isset($auxProfile['unitNumber']) ? $auxProfile['unitNumber']:''; ?>" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name = "updatedEmail" value = "<?php echo isset($auxProfile['auxEmail']) ? $auxProfile['auxEmail']:''; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name = "updatedPass" value = "<?php echo isset($auxProfile['auxPass']) ? $auxProfile['auxPass']:''; ?>">
    </div>
   
    <?php
    if(isset($message)){
    	if($message == true)
                    echo "<div class = 'alert alert-success'>Your Profile Has Been Updated</div>";
                $message = false;
    }
            ?>


      <div class="buttonStudent">
                <input type = "submit" class = "buttonSubmit" 
                value = "Update">
            </div><br>
  </form>
<div class = "buttonStudent">
                <a href = "../auxiliary-main-interface.php"><button class="buttonSubmit">Cancel</button></a>
            </div>
    </div>

</div>

</body>
</html>