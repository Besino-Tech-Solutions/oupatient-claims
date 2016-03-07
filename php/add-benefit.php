<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$benefit_name = mysql_escape_string($_POST['benefit_name']);
$benefit_remarks = mysql_escape_string($_POST['benefit_remarks']);
$eligible = mysql_escape_string($_POST['eligible']);
$breakdown_remarks = mysql_escape_string($_POST['breakdown_remarks']);

$created_by = '99';

$sql = "INSERT INTO benefits
				(date_created,
					benefit_name,
						benefit_remarks,
							eligible,
								breakdown_remarks,
							created_by)
			VALUES (null,
						'".$benefit_name."',
							'".$benefit_remarks."',
								'".$eligible."',
									'".$breakdown_remarks."',
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



	header('location: ../pages/benefits-maintenance.php?message=1');


?>