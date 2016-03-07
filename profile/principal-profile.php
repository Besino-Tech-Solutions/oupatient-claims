<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once '../includes.php'; ?>

</head>

<body>

<?php 
require_once '../dashboard/dashboard.php';
require_once '../modals/add-dependent-modal.php'; 
?>



<div id="page-wrapper">
<div class="container-fluid">
<BR>
<div class="row">
<div class="col-lg-12 well">
<div class="col-lg-12">
                            <!-- START OF BODY CONTENT -->


    <div>

  <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#bank" aria-controls="bank" role="tab" data-toggle="tab">Bank</a></li>
        <li role="presentation"><a href="#utilization" aria-controls="utilization" role="tab" data-toggle="tab">Utilization</a></li>
    </ul>

      <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">
            
            <?php
                require_once '../tabs/principal-profile-home.php';
            ?>

        </div>

        <div role="tabpanel" class="tab-pane fade" id="bank">
            <?php
                require_once '../tabs/principal-profile-bank.php';
            ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="utilization">
            <?php
                require_once '../tabs/principal-profile-utilization.php';
            ?>
        </div>
    </div>

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



</body>

</html>
