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

<?php 
require_once '../dashboard/dashboard.php';
require_once '../modals/add-benefit-modal.php';
?>

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
                echo '<p>New benefit added</p>';
                echo '</div>';
            }

        ?>
    
    <BR>
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addnew">Add New Benefit</button>
    <BR><BR>

    <?php include_once '../tables/benefits-list.php'; ?>


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


<!-- JQUERY -->

<?php require_once '../jquery-includes.php'; ?>


</body>

</html>
