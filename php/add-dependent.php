<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$principalid = mysql_escape_string($_POST['principalid']);
$dep_memberid = mysql_escape_string($_POST['dep_memberid']);
$dep_fname = mysql_escape_string($_POST['dep_fname']);
$dep_mname = mysql_escape_string($_POST['dep_mname']);
$dep_lname = mysql_escape_string($_POST['dep_lname']);
$dep_bday = mysql_escape_string($_POST['dep_bday']);
$dep_gender = mysql_escape_string($_POST['dep_gender']);
$dep_relation = mysql_escape_string($_POST['dep_relation']);
$companyid = mysql_escape_string($_POST['companyid']);

$created_by = '99';

$sql = "INSERT INTO dependents
				(date_created,
					principalid,
						dep_fname,
							dep_mname,
								dep_lname,
									created_by,
										dep_bday,
												dep_gender,
													dep_relation,
														companyid,
															dep_memberid,
																status)
			VALUES (null,
						'".$principalid."',
							'".$dep_fname."',
								'".$dep_mname."',
									'".$dep_lname."',
										'".$created_by."',
											'".$dep_bday."',
													'".$dep_gender."',
														'".$dep_relation."',
															'".$companyid."',
																'".$dep_memberid."',
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



	header('location: ../profile/principal-profile.php?id='.$principalid.'message=1');


?>