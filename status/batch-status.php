
<?php

include_once 'conn.php';

// Color for panel

$panel_color = array('panel-primary', 'panel-success', 'panel-red', 'panel-green', 'panel-orange', 'panel-warning', 'panel-danger', 'panel-info', 'panel-blue');



$result = mysqli_query($con,"
                        SELECT * 
                            FROM batches 
                            	ORDER by date_created desc limit 0,30");


$panelctr = 0;

while($row = mysqli_fetch_array($result))
{
	$batch_number = $row['batch_number'];
	$batchid = $row['batchid'];
	$companyid = $row['companyid'];


	// GET company initials

	$result3 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

    while($row3 = mysqli_fetch_array($result3))
    {
        $company_initials = $row3['company_initials'];
    }

	// COUNT NUMBER OF CLAIMANTS

	$getclaimants = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'");

	$getclaimants = mysqli_num_rows($getclaimants);

	// COUNT In Process

	$getinprocess = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='In Process'");

	$getinprocess = mysqli_num_rows($getinprocess);

	// COUNT For Approval

	$getforapproval = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='Pending'");

	$getforapproval = mysqli_num_rows($getforapproval);

	// COUNT Approved

	$getapproved = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='Approved'");

	$getapproved = mysqli_num_rows($getapproved);

	// COUNT In Process

	$getinprocess = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='In Process'");

	$getinprocess = mysqli_num_rows($getinprocess);


	// COUNT Denied

	$getdenied = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='Denied'");

	$getdenied = mysqli_num_rows($getdenied);

	// COUNT Paid

	$getpaid = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$batchid'
                                	AND status='Paid'");

	$getpaid = mysqli_num_rows($getpaid);

	// Color Counter

	if ($panelctr == 9){
		$panelctr=0;
	}
	?>

	<div class="col-lg-4 col-md-6">
	    <div class="panel <?php echo $panel_color[$panelctr]; ?>">
	        <div class="panel-heading">
	            <div class="row">
	                <div class="col-xs-4">
	                    <i class="fa fa-tasks fa-4x"></i>
	                    <div><span class="huge"><?php echo $getclaimants; ?></span>Claimants</div>
	                    <div><?php echo $company_initials; ?></div>
	                </div>
	                <div class="col-xs-8 text-right">
	                    <div class="huge"><?php echo $batch_number; ?></div>
	                    
	                    <div>
	                    	<table>
								<tr>
	                    			<td><?php echo $getinprocess; ?></td>
	                    			<td>In Process</td>
	                    		</tr>

	                    		<tr>
	                    			<td><?php echo $getforapproval; ?></td>
	                    			<td>Pending</td>
	                    		</tr>

	                    		<tr>
	                    			<td><?php echo $getapproved; ?></td>
	                    			<td>Approved</td>
	                    		</tr>

	                    		<tr>
	                    			<td><?php echo $getdenied; ?></td>
	                    			<td>Denied</td>
	                    		</tr>

	                    		<tr>
	                    			<td><?php echo $getpaid; ?></td>
	                    			<td>Paid</td>
	                    		</tr>
	                    	</table>
	                     </div>

	                </div>
	            </div>
	        </div>
	        
	            <div class="panel-footer">
	            	<a href="../profile/batch-profile.php?id=<?php echo $batchid; ?>">
		                <span class="pull-left">View Details</span>
		                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                <div class="clearfix"></div>
	                </a>
	                <a href="#">
		                <span class="pull-left">View Summary</span>
		                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                <div class="clearfix"></div>
	                </a>
	            </div>
	        
	    </div>
	</div>

	<?php 
	$panelctr++;
}


?>


