<?php



include_once 'conn.php';

$doctor_name = mysql_escape_string($_POST['doctor_name']);

// Check if there are other bank accounts that is active

$created_by = '99';

$sql = "INSERT INTO doctors
				(date_created,
					doctor_name,
						created_by,
							status)
			VALUES (null,
						'".$doctor_name."',
							'".$created_by."',
								'Active')";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }





	header('location: ../pages/doctors-maintenance.php?message=1');


?>