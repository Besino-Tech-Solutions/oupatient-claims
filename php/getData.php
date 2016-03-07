<?php


function getRN($btranid){
	include_once 'conn.php';

	$btranid = $btranid;
	$getReimbursementNo = mysqli_query($con, "SELECT memberid, month, entry_no 
									FROM claims_number 
										WHERE btranid='$btranid'");

	while ($row = mysqli_fetch($getReimbursementNo)){
		$memberid = $row['memberid'];
		$month = $row['month'];
		$entry_no = $row['entry_no'];
	}

}


?>