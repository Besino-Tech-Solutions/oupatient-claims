<button onclick="window.print()" class="pull-right no-print btn btn-sm btn-warning">Print this page</button>

    <BR>

    

            <?php include_once '../php/conn.php';
            include_once '../modals/add-account.php';

            $getid = $_GET['id'];

            $result = mysqli_query($con,"
                        SELECT * 
                            FROM principals
                                WHERE principalid='$getid'");
            

            while($row = mysqli_fetch_array($result))
            {
                $principal_memberid = $row['principal_memberid'];
                $principal_fname = $row['principal_fname'];
                $principal_mname = $row['principal_mname'];
                $principal_lname = $row['principal_lname'];
                $principal_bday = $row['principal_bday'];
                $principal_gender = $row['principal_gender'];
                $principal_joiningdate = $row['principal_joiningdate'];
                $created_by = $row['created_by'];
                $date_created = $row['date_created'];
                $updated_by = $row['updated_by'];
                $date_updated = $row['date_updated'];
            }

             ?>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-xs-6">

            <table>
                <tr>
                    <td><p class="static">Member ID No:</p></td>
                    <td><p class="static"><B><?php echo $principal_memberid; ?></B></p></td>
                </tr>

                <tr>
                    <td><p class="static">First Name:</p></td>
                    <td><p class="static"><B><?php echo $principal_fname; ?></B></p></td>
                </tr>

                <tr>
                    <td><p class="static">Middle Name:</p></td>
                    <td><p class="static"><B><?php echo $principal_mname; ?></B></p></td>
                </tr>

                <tr>
                    <td><p class="static">Last Name:</p></td>
                    <td><p class="static"><B><?php echo $principal_lname; ?></B></p></td>
                </tr>
            </table>

        </div>

        <div class="col-lg-6 col-md-6 col-xs-6">

             <table>
                    <tr>
                        <td><p class="static">Date of Birth:</p></td>
                        <td><p class="static"><B><?php echo $principal_bday; ?></B></p></td>
                    </tr>

                    <tr>
                        <td><p class="static">Age:</p></td>
                        <td><p class="static"><B><?php echo  getAge($principal_bday); ?></B></p></td>
                    </tr>

                    <tr>
                        <td><p class="static">Gender:</p></td>
                        <td><p class="static"><B><?php echo $principal_gender; ?></B></p></td>
                    </tr>

                    <tr>
                        <td><p class="static">Joined Date:</p></td>
                        <td><p class="static"><B><?php echo $principal_joiningdate; ?></B></p></td>
                    </tr>
                </table>

        </div>

    </div>

    
    <HR>
    



    <?php include_once '../tables/bank-list.php'; ?>

    <button type="button" class="no-print btn btn-info btn-sm" data-toggle="modal" data-target="#addaccount">Add Account</button>
