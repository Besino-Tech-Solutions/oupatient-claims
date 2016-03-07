<?php

include_once 'conn.php';

$tranid = $_GET['id'];
$btranid = $_GET['btranid'];


$result = mysqli_query($con,"DELETE FROM transaction_entry WHERE tranid='$tranid'");

if ($result){
	header('Location: ../profile/client-transaction-profile.php?message=3&id='.$btranid);
} else{
	die (mysqli_error($con));
}


?>