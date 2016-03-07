<?php


include_once 'conn.php';


$status = mysql_escape_string($_POST['status']);
$btranid = mysql_escape_string($_POST['btranid']);

// CHECK IF BENEFIT IS ELIGIBLE


$created_by = '99';

$sql = "UPDATE transaction_batch
		SET status='$status',
			date_updated=null
		WHERE btranid='$btranid'";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }

	header('location: ../profile/client-transaction-profile.php?id='.$btranid);


?>	