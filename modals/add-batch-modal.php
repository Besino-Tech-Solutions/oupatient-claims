<form action="../php/add-batch.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add New Batch</h4>
</div>
<div class="modal-body">

<!-- START -->

	<div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Batch No.</label>
                <input type="text" min="1" class="form-control" value="<?php 
                $getyear = date('Y').'-';
                echo $getyear;
                 ?>" name="batch_number">
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Date Received</label>
                <input name="date_received" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Company</label>
                <select class="form-control" name="companyid">
                    <?php

                        require_once '../php/conn.php';

                        $sql = mysqli_query($con, "
                            SELECT companyid, company_initials
                                FROM assured_company");

                        while ($row = mysqli_fetch_array($sql)){
                            $companyid = $row['companyid'];
                            $company_initials = $row['company_initials'];

                            echo '<option value="'.$companyid.'">'.$company_initials.'</option>';
                        }

                    ?>
                </select>
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" class="form-control"placeholder="Remarks Area"></textarea>
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

                    <input type="reset" class="btn btn-md btn-danger pull-right" value="Clear">


                    <input type="submit" class="btn btn-md btn-success pull-right" value="Submit" style="margin-right:10px;">
                
                    
                
                </div>

            </div>
        </div>

<!-- END -->

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>


</form>