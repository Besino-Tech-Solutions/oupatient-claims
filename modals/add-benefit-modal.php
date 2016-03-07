<form action="../php/add-benefit.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Entries</h4>
</div>
<div class="modal-body">



    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Benefit Name</label>
                <input type="text" name="benefit_name" placeholder="Benefits Name" class="form-control" autofocus required>
            </div>

            <div class="form-group">
                <label>Eligible for Claim</label>
                <select class="form-control" name="eligible">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                </select>
            </div>


        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Remarks</label>
                <textarea rows="5" name="benefit_remarks" class="form-control" placeholder="Remarks Area"></textarea>
            </div>

            <div class="form-group">
                <label>Breakdown Remarks</label>
                <textarea rows="5" name="breakdown_remarks" class="form-control" placeholder="Remarks Area"></textarea>
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