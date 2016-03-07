<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once '../includes.php'; ?>

</head>

<body>

   <?php require_once '../dashboard/dashboard.php';
    require_once '../modals/add-batch-modal.php'; ?>

   <!-- Content Start -->

     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">

                            <!-- START CONTENT -->

                                <BR>

    
                                <?php 

                                    $getx = $_GET['message'];

                                    if ($getx == 1){
                                        echo '<div class="alert alert-success">';
                                        echo '<p>New Batch Added</p>';
                                        echo '</div>';
                                    }

                                ?>

                                <BR>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addnew">Add New Batch</button>
                                <BR><BR>
                                <?php include_once '../tables/batch-list.php'; ?>

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

<?php require_once '../jquery-includes.php'; ?>

</body>

</html>
