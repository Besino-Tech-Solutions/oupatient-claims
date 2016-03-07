<form action="../php/add-accounts.php" method="POST">

<?php

$getid = $_GET['id'];
$getcompanyid = $_GET['companyid'];

?>

<input type="hidden" name="principalid" value="<?php echo $getid; ?>">
<input type="hidden" name="companyid" value="<?php echo $getcompanyid; ?>">

<div id="addaccount" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Add Bank Account</h4>
</div>
<div class="modal-body">



    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Bank</label>
                <input type="text" name="bank" placeholder="Bank Name (BPI, BDO, PNB, etc.)" class="form-control" autofocus required>
            </div>

            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="acct_number" placeholder="Account Number" class="form-control" required>
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