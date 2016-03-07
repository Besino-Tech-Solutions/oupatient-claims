<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once '../includes.php'; ?>

</head>

<body>

<?php 
require_once '../dashboard/dashboard.php';
?>



<div id="page-wrapper">
<div class="container-fluid">
<BR>


<!-- CREATE ALERTS ON INSERT SUCCESS OR FAILED -->
<?php if (isset($_GET['message'])){
    $checkmessage = $_GET['message'];
     ?>

    <?php if ($checkmessage == 2){ ?>
    <div class="alert alert-danger fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Failed!</strong> Possible duplicate of entry.
    </div>

    <?php 
    } elseif ($checkmessage == 1){

    ?>

    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Entry added to batch.
    </div>

    <?php } 
    }?>

<!-- END ALERT -->

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
                            FROM batches
                                WHERE batchid='$getid'");
            

            while($row = mysqli_fetch_array($result))
            {
                $batch_number = $row['batch_number'];
                $companyid = $row['companyid'];
                $remarks = $row['remarks'];
                $created_by = $row['created_by'];
                $date_received = $row['date_received'];

                $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row1 = mysqli_fetch_array($result1))
                {
                    $company_name = $row1['company_name'];
                }
            }

             ?>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-xs-6">

            <table>
                <tr>
                    <td><p class="static">Batch No.:</p></td>
                    <td><p class="static"><B><?php echo $batch_number; ?></B></p></td>
                </tr>

                <tr>
                    <td><p class="static">Company Name:</p></td>
                    <td><p class="static"><B><?php echo $company_name; ?></B></p></td>
                </tr>

                <tr>
                    <td><p class="static">Remarks:</p></td>
                    <td><p class="static"><B><?php echo $remarks; ?></B></p></td>
                </tr>


                <tr>
                        <td><p class="static">Date Received:</p></td>
                        <td><p class="static"><B><?php echo $date_received; ?></B></p></td>
                    </tr>
            </table>

        </div>

     

    </div>

    <HR>
    
<div>
    <?php include_once '../tables/batch-content-list.php'; ?>
</div>

<div class="no-print">
    <?php include_once '../tables/claimant-list.php'; ?>
</div>


  



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

<?php include_once '../jquery-includes.php';


            mysqli_close($con);
?>

</body>

</html>
