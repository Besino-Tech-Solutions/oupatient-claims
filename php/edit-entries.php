<?php


include_once 'conn.php';


$btranid = mysql_escape_string($_POST['btranid']);
$tranid = mysql_escape_string($_POST['tranid']);
$benefitid = mysql_escape_string($_POST['benefitid']);
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

$sql = "UPDATE transaction_entry
		SET benefitid='$benefitid',
			description='$description',
			days='$days',
			claim_date='$claim_date',
			or_no='$or_no',
			eligible_amt='$eligible_amt',
			net_payable='$net_payable',
			claim_amt='$claim_amt'
		WHERE tranid='$tranid'";

	if (!mysqli_query($con,$sql))
	  {
	 	 die('Error: 1 ' . mysqli_error($con));
	  }

	header('location: ../profile/client-transaction-profile.php?id='.$btranid.'&message=2');


?>	