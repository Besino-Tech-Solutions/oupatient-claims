<form action="../php/insert-conditions.php" method="POST">

<?php

$getid = $_GET['id'];

?>

<input type="hidden" name="btranid" value="<?php echo $getid; ?>">

<div id="insertcondition" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Update Condition</h4>
</div>
<div class="modal-body">

<?php 

require_once '../php/conn.php';

$getdoctors = mysqli_query($con,"SELECT * FROM conditions");



?>
    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Condition Name</label>
                <select name="conditionid" class="form-control">
                    <?php

                    while ($row = mysqli_fetch_array($getdoctors)){
                        $conditionid = $row['conditionid'];
                        $condition_name = $row['condition_name'];
                        $condition_remarks = $row['condition_remarks'];

                        echo '<option value='.$conditionid.' data-toggle="tooltip" title="'.$condition_remarks.'">'.$condition_name.'</option>';
                    }

                    ?>
                </select>


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



</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<a href="#" onclick="window.open('../pages/conditions-maintenance.php');" class="btn btn-info btn-sm">Add New Condition</a>

</div>
</div>

</div>
</div>

