<?php
// session_start();
// session_regenerate_id(true);

include_once 'conn.php';
// include_once 'secured.php';


// $uid = $_SESSION['SESS_USER_ID'];
// $updater = $_SESSION['SESS_UNAME'];

$batchid = mysql_escape_string($_GET['batchid']);
$companyid = mysql_escape_string($_GET['companyid']);
$clientid = mysql_escape_string($_GET['clientid']);
$type = mysql_escape_string($_GET['type']);

$created_by = '99';

$result = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE clientid='$clientid'
                                	AND type='$type'
                                		AND batchid='$batchid'");

$getcount = mysqli_num_rows($result);

if ($getcount > 0){
	header('location: ../profile/batch-profile.php?id='.$batchid.'&message=2');
} else{
	$sql = "INSERT INTO transaction_batch
				(date_created,
					batchid,
						companyid,
							clientid,
								type,
									created_by,
										status)
			VALUES (null,
						'".$batchid."',
							'".$companyid."',
								'".$clientid."',
									'".$type."',
										'".$created_by."',
											'In Process')";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }

	  $last_id = mysqli_insert_id($con);

	// get entry no in batch

	$result1 = mysqli_query($con,"
                        SELECT * 
                            FROM claims_number
                                WHERE batchid='$batchid'
                                	ORDER BY claimid desc limit 0, 1");

	while($row1 = mysqli_fetch_array($result1)){
		$batch_entry = $row1['batch_entry'];
	}

	

	// get memberid 

	if ($type=='Principal'){
		$result3 = mysqli_query($con,"
                        SELECT * 
                            FROM principals
                                WHERE principalid='$clientid'");

		while($row3 = mysqli_fetch_array($result3)){
			$memberid = $row3['principal_memberid'] + 1;
		}
	} else{
		$result3 = mysqli_query($con,"
                        SELECT * 
                            FROM dependents
                                WHERE depid='$clientid'");

		while($row3 = mysqli_fetch_array($result3)){
			$memberid = $row3['dep_memberid'] + 1;
		}
	}
	
	// get utilization number of member

	$result2 = mysqli_query($con,"
                        SELECT * 
                            FROM claims_number
                                WHERE memberid='$memberid'");

	$entry_no = mysqli_num_rows($result2);

	// insert to claims_number the ID's

	if ($batch_entry < 1){
		$batch_entry = 1;
	} else{
		$batch_entry ++;
	}
	if ($entry_no < 1){
		$entry_no = 1;
	} else{
		$entry_no ++;
	}

	$getmonth = date('m');
	$getyear = date('y');

	$sql1 = "INSERT INTO claims_number
				(date_created,
					batchid,
						memberid,
							month,
								year,
									created_by,
										entry_no,
											batch_entry,
												btranid)
			VALUES (null,
						'".$batchid."',
							'".$memberid."',
								'".$getmonth."',
									'".$getyear."',
										'".$created_by."',
											'".$entry_no."',
												'".$batch_entry."',
													'".$last_id."')";

	if (!mysqli_query($con,$sql1))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }
            


	header('location: ../profile/batch-profile.php?id='.$batchid.'&message=1');
}


?>