<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once '../includes.php'; ?>

</head>

<body>

<?php 
require_once '../dashboard/dashboard.php';
require_once '../modals/add-company-modal.php'; 
?>



<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12">
                            <!-- START OF BODY CONTENT -->

    <BR>


    <?php 

        $getx = $_GET['message'];

        if ($getx == 1){
            echo '<div class="alert alert-success">';
            echo '<p>Insurance Company Added</p>';
            echo '</div>';
        }

    ?>

    <BR>
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addnew">Add New Assured Company</button>

    <BR>
    <BR>

    <?php include_once '../tables/company-list.php'; ?>

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


<?php include_once '../jquery-includes.php'; ?>



</body>

</html>
