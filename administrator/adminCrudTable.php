<?php
require_once 'auxiliaryConnectDB.php';
require_once 'adminFunc.php';

function createAdminCrudTable(){
	$auxConnection = connectAuxDB();	

	$query = "SELECT * FROM student ORDER BY auxiliaryID , lastName ;";
	$result = $auxConnection->query($query);
	if(!$result) die ("query1 failed".$auxConnection->error);

	$rows = $result->num_rows;


	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Student Name</th>";
				echo "<th>Student Email</th>";
				echo "<th>Application Status</th>";
				echo "<th>Payment Status</th>";
				echo "<th>Options</th>";
			echo "</tr>";
		echo "</thead>";
    echo "<tbody>";
for($i = 0;$i<$rows;$i++){
	$result->data_seek($i);
	$record = $result->fetch_array(MYSQLI_ASSOC);
	$studID = $record["studentID"];
	$studName = $record["lastName"]." ".$record["firstName"];
	$studEmail = $record["studentEmail"];
	$appStatus = getStatus($studID);
	if($appStatus == "Incomplete")
  		$statusRow = "<td class = 'alert alert-warning'>".$appStatus."</td>";
	else
  		$statusRow = "<td class = 'alert alert-success'>".$appStatus."</td>";

	$paymentStatus = getPayStatus($studID);
	if($paymentStatus == "Not Paid")
  		$paymentStatusRow = "<td class = 'alert alert-warning'>".$paymentStatus."</td>";
	else
  		$paymentStatusRow = "<td class = 'alert alert-success'>".$paymentStatus."</td>";

echo "<tr>";
  echo "<td> $studID </td>";
  echo "<td> $studName </td>";
  echo "<td> $studEmail</td>";
  echo $statusRow;
  echo $paymentStatusRow;
  echo "<td> <a class = 'btn' href = 'admin-crud-view.php?id=".$studID."'><span class='glyphicon glyphicon-file'></span>View</a>
  <a class = 'btn' href = 'admin-crud-updatePayment.php?id=".$studID."'><span class='glyphicon glyphicon-usd'></span>Mark As Paid</a>
  <a class = 'delete' href = 'admin-crud-delete.php?id=".$studID."'><span class='glyphicon glyphicon-minus-sign'></span>Delete</a> </td>";
 echo "</tr>";

}// end of for loop

echo "</tbody>";
	echo "</table>";	

//jqery function to make sure the user wants to delete
echo "<script>
$('.delete').click(function(){return confirm('Are you sure you want to delte this application?');});
</script>";

closeConnection($auxConnection);

}// end of create table func

?>

  