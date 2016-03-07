<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$bank = mysql_escape_string($_POST['bank']);
$acct_number = mysql_escape_string($_POST['acct_number']);
$principalid = mysql_escape_string($_POST['principalid']);
$companyid = mysql_escape_string($_POST['companyid']);

// Check if there are other bank accounts that is active

$checkacct = mysqli_query($con, "SELECT status 
									FROM bank_accounts 
										WHERE principalid='$principalid'
											AND status='Active'");

if (mysqli_num_rows($checkacct) > 0){
	$status ='Inactive';
} else{
	$status = 'Active';
}

$created_by = '99';

$sql = "INSERT INTO bank_accounts
				(date_created,
					bank,
						acct_number,
							principalid,
								status,
									created_by)
			VALUES (null,
						'".$bank."',
							'".$acct_number."',
								'".$principalid."',
									'".$status."',
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



	header('location: ../profile/principal-profile.php?message=bank1&id='.$principalid.'&companyid='.$companyid);


?>