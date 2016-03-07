<form action="../php/add-dependent.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add New Dependent</h4>
</div>
<div class="modal-body">


        <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Dependent ID No.</label>
                <input type="text" name="dep_memberid" placeholder="ID No." class="form-control" autofocus required>
            </div>
            
        </div>

        </div>

        <div class="row">

        <div class="col-lg-6 col-md-6">
            <input type="hidden" name="principalid" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="companyid" value="<?php echo $_GET['companyid']; ?>">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="dep_fname" placeholder="First Name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="dep_mname" placeholder="Middle Name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="dep_lname" placeholder="Last Name" class="form-control" required>
            </div>
            

        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dep_bday"class="form-control" required>
            </div>


            <div class="form-group">
                <label>Gender </label>
                <label class="radio-inline">
                    <input type="radio" name="dep_gender" id="optionsRadiosInline1" value="Male">Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="dep_gender" id="optionsRadiosInline2" value="Female">Female
                </label>
            </div>

            <div class="form-group">
                <label>Relationship to Principal</label>
                <input type="text" name="dep_relation" placeholder="Son, Daughter, Wife, Husband, etc." class="form-control" required>
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