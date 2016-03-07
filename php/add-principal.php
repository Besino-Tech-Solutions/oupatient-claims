<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$principal_memberid = mysql_escape_string($_POST['principal_memberid']);
$companyid = mysql_escape_string($_POST['companyid']);
$principal_fname = mysql_escape_string($_POST['principal_fname']);
$principal_mname = mysql_escape_string($_POST['principal_mname']);
$principal_lname = mysql_escape_string($_POST['principal_lname']);
$principal_bday = mysql_escape_string($_POST['principal_bday']);
$principal_gender = mysql_escape_string($_POST['principal_gender']);
$principal_joiningdate = mysql_escape_string($_POST['principal_joiningdate']);

$created_by = '99';

$sql = "INSERT INTO principals
				(date_created,
				companyid,
					principal_memberid,
						principal_fname,
							principal_mname,
								principal_lname,
									created_by,
										principal_bday,
												principal_gender,
													principal_joiningdate,
														status)
			VALUES (null,
					'".$companyid."',
						'".$principal_memberid."',
							'".$principal_fname."',
								'".$principal_mname."',
									'".$principal_lname."',
										'".$created_by."',
											'".$principal_bday."',
													'".$principal_gender."',
														'".$principal_joiningdate."',
															'Active')";

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



	header('location: ../pages/principal-maintenance.php?message=1');


?>