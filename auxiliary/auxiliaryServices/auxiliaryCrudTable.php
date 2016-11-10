<?php
require_once 'auxiliaryConnectDB.php';

function createCrudTable(){
	$auxConnection = connectAuxDB();

$auxID = $_COOKIE["auxiliaryID"];
$query = "SELECT * FROM student WHERE auxiliaryID = '$auxID';";

$result = $auxConnection->query($query);
if(!$result) die("query failed ".$auxConnection->error);

/*
<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
*/
$rows = $result->num_rows;
echo "<div class="container">";
	echo "<table class = 'table table-striped'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Student Name</th>";
				echo "<th>Status</th>";
				echo "<th>Options</th>";
			echo "</tr>";
		echo "</thead>";

	echo "</table>";
echo "</div>";	
}// end of create table function

?>
