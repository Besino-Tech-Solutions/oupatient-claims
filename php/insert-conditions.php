<?php


include_once 'conn.php';


$conditionid = mysql_escape_string($_POST['conditionid']);
$btranid = mysql_escape_string($_POST['btranid']);

// CHECK IF BENEFIT IS ELIGIBLE


$created_by = '99';

$sql = "UPDATE transaction_batch
		SET conditionid='$conditionid'
		WHERE btranid='$btranid'";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }

	header('location: ../profile/client-transaction-profile.php?id='.$btranid);


?>	