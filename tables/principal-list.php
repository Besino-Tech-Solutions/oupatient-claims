<LEGEND>List of Principal</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>ID No.</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Date of Birth</th>
                <th>Age</th> 
                <th>Gender</th>
                <th>Joining Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM principals");
            

            while($row = mysqli_fetch_array($result))
            {

                $principalid = $row['principalid'];
                $principal_memberid = $row['principal_memberid'];
                $principal_fname = $row['principal_fname'];
                $principal_mname = $row['principal_mname'];
                $principal_lname = $row['principal_lname'];
                $principal_bday = $row['principal_bday'];
                $principal_gender = $row['principal_gender'];
                $principal_joiningdate = $row['principal_joiningdate'];
                $companyid = $row['companyid'];
                $status = $row['status'];
               

                $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row1 = mysqli_fetch_array($result1))
                {
                    $company_initials= $row1['company_initials'];
                }
            ?>
            <tr onclick="window.document.location='../profile/principal-profile.php?id=<?php echo $principalid; ?>&companyid=<?php echo $companyid; ?>';">

            <td><?php echo $principal_memberid; ?></td>
            <td><?php echo $principal_fname; ?></td>
            <td><?php echo $principal_mname; ?></td>
            <td><?php echo $principal_lname; ?></td>
            <td><?php echo $company_initials; ?></td>
            <td><?php echo $principal_bday; ?></td>
            <td><?php echo getAge($principal_bday); ?></td>
            <td><?php echo $principal_gender; ?></td>
            <td><?php echo $principal_joiningdate; ?></td>
            <td><?php echo $status; ?></td>
            <?php

            echo '</tr>';


            }
            mysqli_close($con);
            ?>
      


        </tbody>
    </table>