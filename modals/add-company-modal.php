<form action="../php/add-company.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add New Assured Company</h4>
</div>
<div class="modal-body">


        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Assured Company Name</label>
                    <input type="text" placeholder="Insurance Name" class="form-control" autofocus required name="company_name">
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control"placeholder="Remarks Area" name="company_remarks"></textarea>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Initials to use</label>
                    <input type="text" placeholder="Initials" class="form-control" required name="company_initials">
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Initial Funds</label>
                    <input type="number" placeholder="Numbers only, no decimal places" class="form-control" required name="company_initialfunds">
                </div>
            </div>

        </div>

        <HR>
        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Insurance Company</label>
                    <select class="form-control" name="insuranceid">
                        <?php 
                            require_once '../php/conn.php';

                            $sql = mysqli_query($con, "
                                SELECT insuranceid, insurance_initials
                                    FROM insurance_company");

                            while ($row = mysqli_fetch_array($sql)){
                                $insuranceid = $row['insuranceid'];
                                $insurance_initials = $row['insurance_initials'];

                                echo '<option value="'.$insuranceid.'">'.$insurance_initials.'</option>';
                            }

                        ?>
                    </select>
                </div>
            </div>



            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Company Address</label>
                    <input type="text" class="form-control" placeholder="Company Address" required name="company_address">
                </div>
            </div>



        </div>


        <HR>

        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Funds Critical Point</label>
                    <input type="number" min="1" placeholder="Numbers only, no decimal" class="form-control" required name="critical_point">
                </div>
            </div>

        </div>

        <HR>

        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Contact Person 1</label>
                    <input type="text" class="form-control" placeholder="Name of contact person" required name="contact_person1">
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" placeholder="09xxxxxxxxx" class="form-control" name="contact_no1">
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
                    <input type="email" placeholder="sample@email.com" class="form-control" name="email_address1">
                </div>
            </div>


        </div>

        <HR>

        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label>Contact Person 2</label>
                    <input type="text" class="form-control" placeholder="Name of contact person" required name="contact_person2">
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" placeholder="09xxxxxxxxx" class="form-control" name="contact_no2">
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
                    <input type="email" placeholder="sample@email.com" class="form-control" name="email_address2">
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