<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$batch_number = mysql_escape_string($_POST['batch_number']);
$date_received = mysql_escape_string($_POST['date_received']);
$remarks = mysql_escape_string($_POST['remarks']);
$companyid = mysql_escape_string($_POST['companyid']);

$created_by = '99';

$sql = "INSERT INTO batches
				(date_created,
					batch_number,
						date_received,
							remarks,
								companyid,
									created_by)
			VALUES (null,
						'".$batch_number."',
							'".$date_received."',
								'".$remarks."',
									'".$companyid."',
										'".$created_by."')";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }


	  // $getID = mysqli_insert_id($con);

	  // $sql3 = "INSERT INTO audit_trails
			// 	(userID,
			// 		username,
			// 			action,
			// 				refID)
			// VALUES ('".$uid."',
			// 			'".$updater."',
			// 				'Added New Document Type',
			// 					'".$getID."')";

			// if (!mysqli_query($con,$sql3)){
				
			// 	  die('Error: 3 '.mysqli_error($con));
			// }



	header('location: ../pages/batch-maintenance.php?message=1');


?>