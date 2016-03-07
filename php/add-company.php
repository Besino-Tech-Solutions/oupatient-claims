<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$company_name = mysql_escape_string($_POST['company_name']);
$company_initials = mysql_escape_string($_POST['company_initials']);
$company_remarks = mysql_escape_string($_POST['company_remarks']);
$contact_person1 = mysql_escape_string($_POST['contact_person1']);
$contact_person2 = mysql_escape_string($_POST['contact_person2']);
$contact_no1 = mysql_escape_string($_POST['contact_no1']);
$contact_no2 = mysql_escape_string($_POST['contact_no2']);
$email_address1 = mysql_escape_string($_POST['email_address1']);
$email_address2 = mysql_escape_string($_POST['email_address2']);
$company_address = mysql_escape_string($_POST['company_address']);
$insuranceid = mysql_escape_string($_POST['insuranceid']);
$company_initialfunds = mysql_escape_string($_POST['company_initialfunds']);
$critical_point = mysql_escape_string($_POST['critical_point']);

$created_by = '99';

$sql = "INSERT INTO assured_company
				(date_created,
					company_name,
						company_initials,
							company_remarks,
								contact_person1,
									contact_person2,
										contact_no1,
											contact_no2,
												email_address1,
													email_address2,
														created_by,
															company_address,
																insuranceid,
																	company_initialfunds,
																		critical_point)
			VALUES (null,
						'".$company_name."',
							'".$company_initials."',
								'".$company_remarks."',
									'".$contact_person1."',
										'".$contact_person2."',
											'".$contact_no1."',
												'".$contact_no2."',
													'".$email_address1."',
														'".$email_address2."',
															'".$created_by."',
																'".$company_address."',
																	'".$insuranceid."',
																		'".$company_initialfunds."',
																			'".$critical_point."')";

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



	header('location: ../pages/company-maintenance.php?message=1');


?>