<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$insurance_name = mysql_escape_string($_POST['insurance_name']);
$insurance_initials = mysql_escape_string($_POST['insurance_initials']);
$insurance_remarks = mysql_escape_string($_POST['insurance_remarks']);
$contact_person1 = mysql_escape_string($_POST['contact_person1']);
$contact_person2 = mysql_escape_string($_POST['contact_person2']);
$contact_no1 = mysql_escape_string($_POST['contact_no1']);
$contact_no2 = mysql_escape_string($_POST['contact_no2']);
$email_address1 = mysql_escape_string($_POST['email_address1']);
$email_address2 = mysql_escape_string($_POST['email_address2']);
$insurance_address = mysql_escape_string($_POST['insurance_address']);

$created_by = '99';

$sql = "INSERT INTO insurance_company
				(date_created,
					insurance_name,
						insurance_initials,
							insurance_remarks,
								contact_person1,
									contact_person2,
										contact_no1,
											contact_no2,
												email_address1,
													email_address2,
														created_by,
															insurance_address)
			VALUES (null,
						'".$insurance_name."',
							'".$insurance_initials."',
								'".$insurance_remarks."',
									'".$contact_person1."',
										'".$contact_person2."',
											'".$contact_no1."',
												'".$contact_no2."',
													'".$email_address1."',
														'".$email_address2."',
															'".$created_by."',
																'".$insurance_address."')";

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



	header('location: ../pages/insurance-maintenance.php?message=1');


?>