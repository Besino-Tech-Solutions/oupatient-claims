<form action="../php/add-insurance.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add New Insurance Company</h4>
</div>
<div class="modal-body">



    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Insurance Company Named</label>
                <input type="text" name="insurance_name" placeholder="Insurance Name" class="form-control" autofocus required>
            </div>


            <div class="form-group">
                <label>Initials to used</label>
                <input type="text" name="insurance_initials" placeholder="Initials" class="form-control" required>
            </div>

        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Remarks</label>
                <textarea rows="5" name="insurance_remarks" class="form-control"placeholder="Remarks Area"></textarea>
            </div>
        </div>


    </div>

    <div class="row">

            <div class="col-lg-4 col-md-4">
              
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Company Address</label>
                    <input type="text" class="form-control" name="insurance_address" placeholder="Company Address" required>
                </div>
            </div>



        </div>

    <div class="row">

        



    </div>
    <HR>
    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Contact Person 1</label>
                <input type="text" name="contact_person1" class="form-control" placeholder="Name of contact person">
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Contact No.</label>
                <input type="text" name="contact_no1" placeholder="09xxxxxxxxx" class="form-control">
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
                <label>Email Address</label>
                <input type="email" name="email_address1" placeholder="sample@email.com" class="form-control">
            </div>
        </div>


    </div>

    <HR>

    <div class="row">

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>Contact Person 2</label>
                <input type="text" name="contact_person2" class="form-control" placeholder="Name of contact person">
            </div>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="form-group">
                <label>Contact No.</label>
                <input type="text" name="contact_no2" placeholder="09xxxxxxxxx" class="form-control">
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
                <label>Email Address</label>
                <input type="email" name="email_address2" placeholder="sample@email.com" class="form-control">
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