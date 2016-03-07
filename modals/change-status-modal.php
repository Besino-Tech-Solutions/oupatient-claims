<form action="../php/change-status.php" method="POST">


<div id="changestatus" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">


<input type="hidden" name="btranid" value="<?php echo $_GET['id']; ?>">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Change Transaction Status</h4>
</div>
<div class="modal-body">



    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="In Process">In Process</option>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Denied">Denied</option>
                    <option value="Paid">Paid</option>
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



</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>


</form>