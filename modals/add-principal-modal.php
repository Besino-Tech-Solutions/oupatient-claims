<form action="../php/add-principal.php" method="POST">


<div id="addnew" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add New Principal</h4>
</div>
<div class="modal-body">

        <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Principal ID No.</label>
                <input type="text" name="principal_memberid" placeholder="ID No." class="form-control" autofocus required>
            </div>
            
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Company</label>
                <select name="companyid" class="form-control">
<?php
                 require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company");
            

            while($row = mysqli_fetch_array($result))
            {
                $companyid = $row['companyid'];
                $company_initials = $row['company_initials'];
                ?> 

                
                    <option value="<?php echo $companyid; ?>"><?php echo $company_initials; ?></option>
                
                <?php
            }
?>
</select>
               
            </div>
            
        </div>

        </div>


        <div class="row">

        <div class="col-lg-6 col-md-6">
           

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="principal_fname" placeholder="First Name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="principal_mname" placeholder="Middle Name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="principal_lname" placeholder="Last Name" class="form-control" required>
            </div>
            

        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="principal_bday"class="form-control" required>
            </div>


            <div class="form-group">
                <label>Gender </label>
                <label class="radio-inline">
                    <input type="radio" name="principal_gender" id="optionsRadiosInline1" value="Male">Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="principal_gender" id="optionsRadiosInline2" value="Female">Female
                </label>
            </div>

            <div class="form-group">
                <label>Joining Date</label>
                <input type="date" name="principal_joiningdate"class="form-control" required>
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