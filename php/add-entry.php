<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$benefitid = mysql_escape_string($_POST['benefitid']);
$btranid = mysql_escape_string($_POST['btranid']);
$description = mysql_escape_string($_POST['description']);
$days = mysql_escape_string($_POST['days']);
$claim_amt = mysql_escape_string($_POST['claim_amt']);
$claim_date = mysql_escape_string($_POST['claim_date']);
$or_no = mysql_escape_string($_POST['or_no']);

// CHECK IF BENEFIT IS ELIGIBLE

$result = mysqli_query($con,"
                        SELECT * 
                            FROM benefits
                            	WHERE benefitid='$benefitid'");
            

    while($row = mysqli_fetch_array($result))
    {
        $eligible = $row['eligible'];
    }

if ($eligible == 'Yes'){
	$eligible_amt = $claim_amt;
	$net_payable = $claim_amt;
}

$created_by = '99';

$sql = "INSERT INTO transaction_entry
				(date_created,
					benefitid,
						btranid,
							description,
								days,
									created_by,
										claim_amt,
											claim_date,
												or_no,
													eligible_amt,
														net_payable)
			VALUES (null,
						'".$benefitid."',
							'".$btranid."',
								'".$description."',
									'".$days."',
										'".$created_by."',
											'".$claim_amt."',
												'".$claim_date."',
													'".$or_no."',
														'".$eligible_amt."',
															'".$net_payable."')";

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



	header('location: ../profile/client-transaction-profile.php?id='.$btranid.'&message=1');


?>	