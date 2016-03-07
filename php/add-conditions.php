<?php



include_once 'conn.php';

$condition_name = mysql_escape_string($_POST['condition_name']);
$condition_remarks = mysql_escape_string($_POST['condition_remarks']);

// Check if there are other bank accounts that is active

$created_by = '99';

$sql = "INSERT INTO conditions
				(date_created,
					condition_name,
						created_by,
							condition_remarks)
			VALUES (null,
						'".$condition_name."',
							'".$created_by."',
								'".$condition_remarks."')";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }





	header('location: ../pages/conditions-maintenance.php?message=1');


?>