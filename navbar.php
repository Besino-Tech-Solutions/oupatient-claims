


<?php
  session_start();
  session_regenerate_id(true);
    
    date_default_timezone_set("Asia/Manila");
	$getuser = $_SESSION['SESS_USER_ID'];

    include_once "php/secured.php";
	
	include_once '/php/conn.php';
    // Checks if already logged in.
    if(!isset($_SESSION['SESS_USER_ID'])) {

      $message = encryptor("encrypt","Login Required");
      header("location: ../index.php?message=".$message);
    exit();
    }
?>


 <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home.php" style="color:black;">Doc Dispatch 1.0</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- <li><a href="/home.php">Home</a></li> -->  


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">Clients<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/contacts/office.php" style="color:black;">Clients List</a></li>
                <?php if($_SESSION['addclient'] == 1){
                  ?>
                <li><a href="/clients/add-new-client.php" style="color:black;">Add New Client</a></li>
                <?php } ?>
              </ul>
            </li>
	<?php
	$result01 = mysqli_query($con,"
											SELECT * 
												FROM doc_transactions
													WHERE status='In Process'
														AND userID='$getuser'");
								
			$getmydocs = mysqli_num_rows($result01);
			
			$result02 = mysqli_query($con,"
											SELECT * 
												FROM doc_transactions
													WHERE status='For Out'");
			
			$getforout = mysqli_num_rows($result02);

	?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">Documents <span class="badge" style="background-color:#ff0000;"><?php 
			  
			  if ($_SESSION['dispatchdoc'] != 1){
				 echo $getmydocs; 
			  } else{
				  echo $getmydocs + $getforout;
			  }
			  
			  
			  
			  ?></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/tables/document-list.php" style="color:black;">Document List</a></li>
                <?php if($_SESSION['pickupdeliver'] == 1){
                  ?>
                  <li><a href="/tables/my-documents.php" style="color:black;">My Documents <span class="badge" style="background-color:#ff0000;"><?php echo $getmydocs; ?></span></a></li>
                <?php } ?>
                <li role="separator" class="divider" style="color:black;"></li>
                <li><a href="/tables/for-delivery.php" style="color:black;">For Delivery</a></li>
                <li><a href="/tables/for-pickup.php" style="color:black;">For Pickup</a></li>
                <li role="separator" class="divider" style="color:black;"></li>
                <li><a href="/tables/in-process.php" style="color:black;">In Process</a></li>
                <li><a href="/tables/for-out.php" style="color:black;">For Out <span class="badge" style="background-color:#ff0000;"><?php
				if ($_SESSION['dispatchdoc'] == 1){
					echo $getforout;
				}
				?></span></a></li>
                <li><a href="/tables/for-dispatch.php" style="color:black;">For Dispatch</a></li>
                <li><a href="/tables/for-completion.php" style="color:black;">For Completion</a></li>
                <li><a href="/tables/completed.php" style="color:black;">Completed</a></li>
                <li role="separator" class="divider" style="color:black;"></li>
                <?php if($_SESSION['adddoc'] == 1){
                  ?>
                  <li><a href="/documents/add-doc-type.php" style="color:black;">Add Document Type</a></li>
                <?php } ?>
                <li><a href="/tables/doc-type-list.php" style="color:black;">Document Type List</a></li>
               

              </ul>
            </li>
            <?php if($_SESSION['itinerary'] == 1){
                  ?>
              <li><a href="/transactions/select-messenger.php" style="color:black;">Itinerary</a></li>
            <?php } ?>
            <li class="dropdown">
            <?php if($_SESSION['adduser'] == 1 || $_SESSION['updateuser'] == 1 || $_SESSION['addmess'] == 1 || $_SESSION['updatemess'] == 1){
                  ?>
			<?php
			
			$result = mysqli_query($con,"
											SELECT * 
												FROM delete_request");
								
			$getdelrequest = mysqli_num_rows($result);
			
			
								
			?>
				  
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">Admin <?php if($_SESSION['admindelete'] == 1){
			  ?><span class="badge" style="background-color:#ff0000;"><?php echo $getdelrequest; ?></span><?php } ?> <span class="caret"></span></a>
            <?php } ?>
              <ul class="dropdown-menu">
                <li><a href="/tables/users-list.php" style="color:black;">Users List</a></li>
                <?php if($_SESSION['adduser'] == 1){
                  ?>
                  <li><a href="/admin/create-user.php" style="color:black;">Add New User</a></li>
                <?php } ?>              
                <li role="separator" class="divider" style="color:black;"></li>
                <li><a href="/tables/messenger-list.php" style="color:black;">Messengers List</a></li>
                <?php if($_SESSION['addmess'] == 1){
                  ?>
                  <li><a href="/admin/create-messenger.php" style="color:black;">Add New Messenger</a></li>
                <?php } ?>  
                <?php if($_SESSION['backupdb'] == 1){
                  ?>
                <li role="separator" class="divider" style="color:black;"></li>
                
                  <li><a href="/admin/backup-database.php" style="color:black;"><b>Backup DB</b></a></li>
                <?php } ?>  
				<?php if($_SESSION['admindelete'] == 1){
                  ?>
                <li role="separator" class="divider" style="color:black;"></li>
                
                  <li><a href="/tables/deletion-list.php" style="color:black;"><b>Deletion Request <span class="badge" style="background-color:#ff0000;"><?php echo $getdelrequest; ?></span> </b></a></li>
				  <li><a href="/tables/deleted-transactions.php" style="color:black;">Deleted Transactions</a></li>
                <?php } ?>  
              </ul>
            </li>

            <li class="dropdown">
              <?php if($_SESSION['reports'] == 1){
                  ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">Reports<span class="caret"></span></a>
              <?php } ?>
              <ul class="dropdown-menu">
                <li><a href="/transactions/messenger-productivity.php" style="color:black;">Messenger Productivity</a></li>
              </ul>
            </li>

              <?php if($_SESSION['audittrails'] == 1){
                  ?>
               <li><a href="/admin/audit-trails.php" style="color:black;">Audit Trails</a></li>
              <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">


            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#" style="color:black;"><span class="glyphicon glyphicon-user"  style="color:black;"></span> <?php echo $_SESSION['SESS_UNAME']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <!-- <li><a href="../users/security-question.php" style="color:black;">Security Question</a></li> -->
              <li><a href="../users/change-password.php" style="color:black;">Change Password</a></li>
            </ul>

            </li>
            <li><a href="../php/logout.php" style="color:black;"><span class="glyphicon glyphicon-off" aria-hidden="true" style="color:black;"></span> Log out</a></li>
            <li style="margin-right:25px;"><?php 
            echo "<font style='font-family:verdana, arial,tahoma;font-size:14px;color:#265173; font-weight:bold;'>";
            echo date("<b>F d, Y");
            echo '<BR>';
            echo date("D - </b>"); 
            echo "</font>";
            ?>
            <span id="curTime"></span></li>
          </ul>
        </div><!-- /.nav-collapse   --> 
      </div>
    </nav>  