<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once '../includes.php'; ?>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<?php require_once '../dashboard/dashboard.php';
require_once '../php/conn.php'; ?>

<!-- Content Start -->

<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12">

<!-- START CONTENT -->
<BR>

<?php 

$tranid = $_GET['id'];
$btranid = $_GET['btranid'];

$gettransaction = mysqli_query($con,"
    SELECT * 
        FROM transaction_entry
        	WHERE tranid='$tranid'");


while($rowtr = mysqli_fetch_array($gettransaction))
{
    $btranid = $rowtr['btranid'];
    $or_no = $rowtr['or_no'];
    $description = $rowtr['description'];
    $days = $rowtr['days'];
    $claim_amt = $rowtr['claim_amt'];
    $claim_date = $rowtr['claim_date'];
    $benefitid = $rowtr['benefitid'];

    // $getbenefit = mysqli_query($con,"
    //                     SELECT * 
    //                         FROM benefits
    //                         	WHERE benefitid='$benefitid'");
            

    // while($rowbe = mysqli_fetch_array($getbenefit))
    // {
    //     $benefit_name = $rowbe['benefit_name'];
    // }
}
?>

<form action="../php/edit-entries.php" method="POST">
	<input type="hidden" name="tranid" value="<?php echo $tranid; ?>">
	<input type="hidden" name="btranid" value="<?php echo $btranid; ?>">

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Benefit</label>
                <select name="benefitid" class="form-control" autofocus>
                    <?php

                    

                    $result = mysqli_query($con,"
                        SELECT * 
                            FROM benefits");
            

                    while($row = mysqli_fetch_array($result))
                    {
                        $benefitidx = $row['benefitid'];
                        $benefit_name = $row['benefit_name'];
                        $benefit_remarks = $row['benefit_remarks'];

                        if ($benefitid == $benefitidx){
                        	echo '<option selected="selected" value='.$benefitid.' data-toggle="tooltip" title="'.$benefit_remarks.'">'.$benefit_name.'</option>';
                        } else{
                        	echo '<option value='.$benefitid.' data-toggle="tooltip" title="'.$benefit_remarks.'">'.$benefit_name.'</option>';
                        }
                    }

                    ?>
                </select>
            </div>


        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Description</label>
                <input type="text" value="<?php echo $description; ?>" name="description" placeholder="Name of drugs/operation" class="form-control">
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Days</label>
                <input type="number" min="0" value="<?php echo $days; ?>" name="days" class="form-control">
            </div>


        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Claim Amount</label>
                <input type="text" name="claim_amt" value="<?php echo $claim_amt; ?>" placeholder="No currency sign, amount only" class="form-control">
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Date of Claim</label>
                <input type="date" name="claim_date" value="<?php echo $claim_date; ?>" class="form-control" required>
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Official Receipt #</label>
                <input type="text" placeholder="OR #" name="or_no" value="<?php echo $or_no; ?>" class="form-control" required>
            </div>
        </div>


    </div>


    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">

                <a href="#" class="btn btn-md btn-danger pull-right">Cancel</a>


                <input type="submit" class="btn btn-md btn-success pull-right" value="Update" style="margin-right:10px;">
            
                
            
            </div>

        </div>


    </div>

</form>




<!-- END CONTENT -->

</div>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>

<!-- Content End -->

</body>

</html>
