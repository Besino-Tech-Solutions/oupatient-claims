<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once '../includes.php'; ?>

<style type="text/css">
    table td, table td * {
    vertical-align: top;
}

</style>

</head>

<body>

<?php 
require_once '../dashboard/dashboard.php';
require_once '../modals/add-entry-modal.php';
require_once '../modals/insert-doctor-modal.php';
require_once '../modals/insert-condition-modal.php';
require_once '../modals/change-status-modal.php';
?>



<div id="page-wrapper">
<div class="container-fluid">
<BR>
<div class="row">
<div class="col-lg-12 well">
<div class="col-lg-12">
                            <!-- START OF BODY CONTENT -->
    <button onclick="window.print()" class="pull-right no-print btn btn-sm btn-warning">Print this page</button>

    <BR>

    

            <?php include_once '../php/conn.php';

            $getid = $_GET['id'];

            $result = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE btranid='$getid'");
            

            while($row = mysqli_fetch_array($result))
            {
                $batchid = $row['batchid'];
                $clientid = $row['clientid'];
                $companyid = $row['companyid'];
                $type = $row['type'];
                $status = $row['status'];
                $doctorid = $row['doctorid'];
                $conditionid = $row['conditionid'];
                $date_created = $row['date_created'];
                $date_updated = $row['date_updated'];

                if ($date_updated != '0000-00-00 00:00:00'){

                    $status_date = date('Y-m-d', strtotime($date_updated));
                } else{
                    $status_date = date('Y-m-d', strtotime($date_created));
                }

                // GET BANK ACCT NAME

                if ($getbank = mysqli_query($con, "SELECT bank, acct_number FROM bank_accounts where principalid='$clientid' AND status='Active'")){
                    while ($getbankacct = mysqli_fetch_array($getbank)){
                        $bank = $getbankacct['bank'];
                        $acct_number = $getbankacct['acct_number'];

                        $bankacct = $bank.' '.$acct_number;
                    }
                } else{
                    $bankacct = 'N/A';
                }

                // GET CONDITION NAME

                if ($getcondition = mysqli_query($con, "SELECT condition_name FROM conditions where conditionid='$conditionid'")){
                    while ($getco1 = mysqli_fetch_array($getcondition)){
                        $condition_name = $getco1['condition_name'];
                    }
                } else{
                    $condition_name = 'N/A';
                }

                // GET DOCTOR'S NAME

                if ($getdoctorname = mysqli_query($con, "SELECT doctor_name FROM doctors where doctorid='$doctorid'")){
                    while ($getdoctorname1 = mysqli_fetch_array($getdoctorname)){
                        $doctor_name = $getdoctorname1['doctor_name'];
                    }
                } else{
                    $doctor_name = 'N/A';
                }

                // GET DETAILS BASED ON TYPE

                if ($type == 'Principal'){

                    $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM principals
                                WHERE principalid='$clientid'");
            

                    while($row1 = mysqli_fetch_array($result1))
                    {
                        $principal_fname = $row1['principal_fname'];
                        $principal_mname = $row1['principal_mname'];
                        $principal_lname = $row1['principal_lname'];
                        $gender = $row1['principal_gender'];
                        $bday = $row1['principal_bday'];
                        $memberid = $row1['principal_memberid'];
                    }

                    $fullname = $principal_fname.' '.$principal_mname.' '.$principal_lname;
                    $principal_name = $fullname;

                } elseif ($type =='Dependent'){

                    $result2 = mysqli_query($con,"
                        SELECT * 
                            FROM dependents
                                WHERE depid='$clientid'");
            

                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $dep_fname = $row2['dep_fname'];
                        $dep_mname = $row2['dep_mname'];
                        $dep_lname = $row2['dep_lname'];
                        $principalid = $row2['principalid'];
                        $bday = $row2['dep_bday'];
                        $gender = $row2['dep_gender'];
                        $memberid = $row2['dep_memberid'];

                        $result1 = mysqli_query($con,"
                            SELECT * 
                                FROM principals
                                    WHERE principalid='$principalid'");
                

                        while($row1 = mysqli_fetch_array($result1))
                        {
                            $principal_fname = $row1['principal_fname'];
                            $principal_mname = $row1['principal_mname'];
                            $principal_lname = $row1['principal_lname'];
                        }
                    }

                    $fullname = $dep_fname.' '.$dep_mname.' '.$dep_lname;
                    $principal_name = $principal_fname.' '.$principal_mname.' '.$principal_lname;
                }

                // GET ID's

                    $result2 = mysqli_query($con,"
                        SELECT * 
                            FROM claims_number
                                WHERE btranid='$getid'");
            

                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $month = $row2['month'];
                        $year = $row2['year'];
                        $batch_entry = $row2['batch_entry'];
                        $entry_no = $row2['entry_no'];

                    }

            }

             ?>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12">

            <table>


                <tr>
                    <td><p class="static"><b>Principal</b></p></td>
                    <td><p class="static"><?php echo $principal_name; ?></p></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Claimant</b></p></td>
                    <td><p class="static"><?php echo $fullname; ?></p></td>
                    <td><p class="static"><b>Claims Reimbursement No</b></p></td>
                    <td><p class="static"><?php echo getRN($getid); ?></p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>ID No.</b></p></td>
                    <td><p class="static"><?php echo $memberid; ?></p></td>
                    <td><p class="static"><b>Claims Entry No.</b></p></td>
                    <td><p class="static"><?php echo getCN($getid); ?></p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Date of Birth</b></p></td>
                    <td><p class="static"><?php echo $bday; ?></p></td>
                    <td><p class="static"><b>Claim Type</b></p></td>
                    <td><p class="static">Outpatient</p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Age</b></p></td>
                    <td><p class="static"><?php echo getAge($bday); ?></p></td>
                    <td><p class="static"></p></td>
                    <td><p class="static"></p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Sex</b></p></td>
                    <td><p class="static"><?php echo $gender; ?></p></td>
                    <td><p class="static"></p></td>
                    <td><p class="static"></p></td>
                </tr>

                <tr>
                    <td><p class="static"></p></td>
                    <td><p class="static"></p></td>
                    <td><p class="static"></p></td>
                    <td><p class="static"></p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Hospital</b></p></td>
                    <td><p class="static">OPD</p></td>
                    <td><p class="static"><b>Date of Claim(s)</b></p></td>
                    <td>

                    <?php 

                    // get claims date

                    $result55 = mysqli_query($con,"
                                        SELECT DISTINCT claim_date 
                                            FROM transaction_entry
                                                WHERE btranid='$getid'
                                                    ORDER BY claim_date asc");
                            

                    while($row55 = mysqli_fetch_array($result55))
                    {
                        $claim_date = $row55['claim_date'];

                        echo $claim_date.'</br>';
                    }

                    ?>


                    </td>
                </tr>

                <tr>
                    <td><p class="static"><b>Attending Physician(s) / Dentist</b></p></td>
                    <td><?php echo $doctor_name; ?> <a href="#insertdoctor" type="button" class="fa fa-edit" data-toggle="modal" data-target="#insertdoctor"> </a></td>
                    <td><p class="static"><b>Claim Received</b></p></td>
                    <td><p class="static">
                        
                    <?php

                    $result56 = mysqli_query($con,"
                                        SELECT * 
                                            FROM batches
                                                WHERE batchid='$batchid'");
                            

                    while($row56 = mysqli_fetch_array($result56))
                    {
                        $date_received = $row56['date_received'];

                        echo $date_received;
                    }

                    ?>

                    </p></td>
                </tr>

                <tr>
                    <td><p class="static"><b>Diagnosis of Condition</b></p></td>
                    <td><?php echo $condition_name; ?> <a href="#insertcondition" type="button" class="fa fa-edit" data-toggle="modal" data-target="#insertcondition"> </a></td>
                    <td><p class="static"><b>Claim Status</b></p></td>
                    <td><?php echo $status.' '.$status_date; ?> <a href="#changestatus" type="button" class="fa fa-edit" data-toggle="modal" data-target="#changestatus"> </a></td>
                </tr>

            </table>

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-xs-12">
                    <button type="button" class="no-print btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addnew">Add New Entry</button>
                </div>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="col col-lg-12 col-md-12 col-xs12">
            <table class="table table-responsive">
                <thead >
                    <th align="center">OR #</th>
                    <th align="center">Benefit</th>
                    <th align="center">Description</th>
                    <th align="center">Days</th>
                    <th align="center">Claim Amount</th>
                    <th align="center">Eligible Amount</th>
                    <th align="center">Recoverable Amount</th>
                    <th align="center">Net Payable</th>
                    <th align="center"></th>
                </thead>

                <tbody>

                    <?php 

                    
                    $getbtranid = $_GET['id'];

                    $result = mysqli_query($con,"
                                SELECT * 
                                    FROM transaction_entry
                                        WHERE btranid='$getid'");
                    

                    while($row = mysqli_fetch_array($result))
                    {
                        
                        $tranid = $row['tranid'];
                        $or_no = $row['or_no'];
                        $benefitid = $row['benefitid'];
                        $description = $row['description'];
                        $days = $row['days'];
                        $claim_amt = $row['claim_amt'];
                        $net_payable = $row['net_payable'];

                        $result1 = mysqli_query($con,"
                                SELECT * 
                                    FROM benefits
                                        WHERE benefitid='$benefitid'");
                    

                        while($row1 = mysqli_fetch_array($result1))
                        {
                            
                            $benefit_name = $row1['benefit_name'];
                            $benefit_remarks = $row1['benefit_remarks'];
                            $eligible = $row1['eligible'];
                        }
                    
                    ?>

                    <tr>
                        <td><?php echo $or_no; ?></td>
                        <td data-toggle="tooltip" title="<?php echo $benefit_remarks; ?>"><?php echo $benefit_name; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $days; ?></td>
                        <td><?php echo $claim_amt; ?></td>
                        <td><?php if ($eligible == 'Yes'){echo $claim_amt;} else {} ?></td>
                        <td></td>
                        <td><?php echo $net_payable; ?></td>
                        <td class="no-print">
                            <a href="../pages/edit-entry.php?id=<?php echo $tranid; ?>" class="fa fa-edit" data-toggle="tooltip" title="Edit Entry"></a> <a onclick="return confirm('Are you sure you want to delete this entry?');" href="../php/delete-entry.php?id=<?php echo $tranid; ?>&btranid=<?php echo $getid; ?>" class="fa fa-remove" data-toggle="tooltip" title="Delete Entry"></a>
                        </td>

                    </tr>

                    <?php
                    }

                    ?>

                </tbody>


                <?php

                        $result11 = mysqli_query($con,"
                                SELECT sum(days) as days_sum,
                                    sum(claim_amt) as claim_sum,
                                        sum(eligible_amt) as eligible_sum,
                                            sum(net_payable) as payable_sum 
                                    FROM transaction_entry
                                        WHERE btranid='$getbtranid'");

                                          
                        
                            while($row11 = mysqli_fetch_array($result11))
                            {
                                
                                $days_sum = $row11['days_sum'];
                                $claim_sum = $row11['claim_sum'];
                                $eligible_sum = $row11['eligible_sum'];
                                $payable_sum = $row11['payable_sum'];
                            }
                        if ($days_sum == null){
                            $days_sum = 0;
                        }

                        if ($claim_sum == null){
                            $claim_sum = 0;
                        }
                        
                        if ($eligible_sum == null){
                            $eligible_sum = 0;
                        }

                        if ($payable_sum == null){
                            $payable_sum = 0;
                        } 
                        
                        
                    ?>

                <tfoot>
                    <th></th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($claim_sum, 2); ?></th>
                    <th><?php echo number_format($eligible_sum, 2); ?></th>
                    <th></th>
                    <th><?php echo number_format($payable_sum, 2); ?></th>
                </tfoot>

            </table>
        </div>
    </div>
    
    <?php 
                $less20 = $payable_sum * 0.20;
                $other_deduct = 0.00;
                $total_deduct = $less20 + $other_deduct;
                $total_payable = $payable_sum - $total_deduct;
                ?>

                <!-- BELOW ENTRIES -->

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-xs-12">
            <div class="col col-lg-3 col-md-3 col-xs-3">
                <p class="static" style="color:blue;"><strong>PHP <?php echo number_format($total_payable, 2); ?></strong></p>
                <p class="static"><strong><?php echo $bankacct; ?></strong></p>
            </div>

            <div class="col col-lg-3 col-md-3 col-xs-3">
                <p class="static"><strong>Total Amount Payable to:</strong></p>
                <p class="static"><strong><?php echo $principal_name; ?></strong></p>
            </div>

            <div class="col col-lg-2 col-md-2 col-xs-2">
                
            </div>

            <div class="col col-lg-2 col-md-2 col-xs-2">
                <p class="static"><strong>Net Eligible</strong></p>
                <p class="static"><strong>Less 20%</strong></p>
                <p class="static"><strong>Other Deductions</strong></p>
                <p class="static"><strong>Total Payable</strong></p>
            </div>

            <div class="col col-lg-2 col-md-2 col-xs-2">
                <p class="static" style="color:blue;"><strong><?php echo number_format($payable_sum, 2); ?></strong></p>

                
                <p class="static" style="color:blue;"><strong><?php echo number_format($less20, 2); ?></strong></p>
                <p class="static" style="color:blue;"><strong><?php echo number_format($other_deduct, 2); ?></strong></p>
                <p class="static" style="color:blue;"><strong><?php echo number_format($total_payable, 2); ?></strong></p>
            </div>

        </div>
    </div>

    <!-- END BELOW ENTRIES -->


    <!-- FOR REMARKS -->

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-xs-12">
            <p class="static"><b>Remarks:</b><BR>
            Your outpatient benefit is payable at 80% of the claim amount.
            </p>

        </div>
    </div>


    <!-- END FOR REMARKS -->


    


                            <!-- END OF BODY CONTENT -->

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



</body>

</html>
