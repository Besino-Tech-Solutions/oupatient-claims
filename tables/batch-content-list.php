<LEGEND>Claimants</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Type</th>
                <th>Fullname</th>
                <th>Company</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $getbatchid = $_GET['id'];

            $result = mysqli_query($con,"
                        SELECT * 
                            FROM transaction_batch
                                WHERE batchid='$getbatchid'");
            

            while($row = mysqli_fetch_array($result))
            {
                $btranid = $row['btranid'];
                ?>
                <tr onclick="
                    window.open('/outpatient-claims/profile/client-transaction-profile.php?id=<?php echo $btranid; ?>')
                ">

                <?php

                $clientid = $row['clientid'];
                $companyid = $row['companyid'];
                $type = $row['type'];

                // GET client name based on type

                if ($type=='Principal'){

                    $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM principals
                                WHERE principalid='$clientid'");
            

                    while($row1 = mysqli_fetch_array($result1))
                    {
                        $principalid = $row1['principalid'];
                        $principal_fname = $row1['principal_fname'];
                        $principal_mname = $row1['principal_mname'];
                        $principal_lname = $row1['principal_lname'];
                        $clientid = $row1['principal_memberid'];
                    }

                    $fullname = $principal_fname.' '.$principal_mname.' '.$principal_lname;

                } elseif ($type='Dependent'){
                    $result2 = mysqli_query($con,"
                        SELECT * 
                            FROM dependents
                                WHERE depid='$clientid'");
            

                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $depid = $row2['depid'];
                        $dep_fname = $row2['dep_fname'];
                        $dep_mname = $row2['dep_mname'];
                        $dep_lname = $row2['dep_lname'];
                        $clientid = $row2['dep_memberid'];
                    }

                    $fullname = $dep_fname.' '.$dep_mname.' '.$dep_lname;
                }

                // GET company initials

                $result3 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row3 = mysqli_fetch_array($result3))
                {
                    $companyid = $row3['companyid'];
                    $company_initials = $row3['company_initials'];
                }

            ?>

            <td><?php echo $clientid; ?></td>
            <td><?php echo $type; ?></td>
            <td><?php echo $fullname; ?></td>
            <td><?php echo $company_initials; ?></td>

            <?php

            echo '</tr>';



            }
            ?>
      


        </tbody>
    </table>