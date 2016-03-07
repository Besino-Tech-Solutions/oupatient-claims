<form action="../php/add-entry.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Entries</h4>
</div>
<div class="modal-body">


<input type="hidden" name="btranid" value="<?php echo $_GET['id']; ?>">

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Benefit</label>
                <select name="benefitid" class="form-control" autofocus>
                    <?php

                    require_once '../php/conn.php';

                    $result = mysqli_query($con,"
                        SELECT * 
                            FROM benefits");
            

                    while($row = mysqli_fetch_array($result))
                    {
                        $benefitid = $row['benefitid'];
                        $benefit_name = $row['benefit_name'];
                        $benefit_remarks = $row['benefit_remarks'];

                        echo '<option value='.$benefitid.' data-toggle="tooltip" title="'.$benefit_remarks.'">'.$benefit_name.'</option>';
                    }

                    ?>
                </select>
            </div>


        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Name of drugs/operation" class="form-control">
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Days</label>
                <input type="number" min="0" value="0" name="days" class="form-control">
            </div>


        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Claim Amount</label>
                <input type="text" name="claim_amt" placeholder="No currency sign, amount only" class="form-control">
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Date of Claim</label>
                <input type="date" name="claim_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Official Receipt #</label>
                <input type="text" placeholder="OR #" name="or_no" class="form-control" required>
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



</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>


</form>