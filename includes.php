<?php
session_start();

?>
<!-- favicon -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>RAROCO Insurance Brokers - Outpatient-Claims</title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<!-- OLD INCLUDES -->

<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>

<!-- css -->

<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.2/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.2/extensions/TableTools/css/dataTables.tableTools.css">

<style type="text/css">
	
	@media print
	{    
	    .no-print, .no-print *
	    {
	        display: none !important;
	    }
	}
	
</style>


<?php 

function getAge($xx){
	$from = new DateTime($xx);
    $to   = new DateTime('today');
    return  $from->diff($to)->y;
}

?>

<?php


// GET REIMBURSEMENT NO

function getRN($data){

	$con = mysqli_connect("localhost","root","root","outpatient_claims");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$btranid = $data;
	$getReimbursementNo = mysqli_query($con, "SELECT * 
									FROM claims_number 
										WHERE btranid='$btranid'");

	while ($row = mysqli_fetch_array($getReimbursementNo)){
		$memberid = $row['memberid'];
		$month = $row['month'];
		$entry_no = $row['entry_no'];
	}

	$reimbursementno = $memberid.' '.str_pad($month, 2, '0', STR_PAD_LEFT).' '.str_pad($entry_no, 4, '0', STR_PAD_LEFT);
	return $reimbursementno;

}

// GET CLAIMS ENTRY NO

function getCN($data){

	$con = mysqli_connect("localhost","root","root","outpatient_claims");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$btranid = $data;
	$getClaimsNo = mysqli_query($con, "SELECT * 
									FROM claims_number 
										WHERE btranid='$btranid'");

	while ($row = mysqli_fetch_array($getClaimsNo)){
		$year = $row['year'];
		$month = $row['month'];
		$batch_entry = $row['batch_entry'];
	}

	$claimsno = str_pad($month, 2, '0', STR_PAD_LEFT).' '.str_pad($batch_entry, 4, '0', STR_PAD_LEFT).' '.$year;
	return $claimsno;

}


?>


<!-- script FOR DATATABLE -->




<!-- END DATATABLE -->