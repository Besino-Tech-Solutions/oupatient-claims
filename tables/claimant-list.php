<BR><BR><LEGEND>List of Clients (not included)</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist1" class="table table-hover">
        <thead>
            <tr>
                <th>ID No.</th>
                <th>Type</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Date of Birth</th>
                <th>Age</th> 
                <th>Gender</th>
                <th>Add</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM principals");
            
            $getbatchid = $_GET['id'];

            while($row = mysqli_fetch_array($result))
            {
                $principalid = $row['principalid'];
                $principal_memberid = $row['principal_memberid'];
                $principal_fname = $row['principal_fname'];
                $principal_mname = $row['principal_mname'];
                $principal_lname = $row['principal_lname'];
                $principal_bday = $row['principal_bday'];
                $principal_age = $row['principal_age'];
                $principal_gender = $row['principal_gender'];
                $companyid = $row['companyid'];

                $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row1 = mysqli_fetch_array($result1))
                {
                    $company_initials = $row1['company_initials'];
                }
            ?>
            <tr>
            <td><?php echo $principal_memberid; ?></td>
            <td>Principal</td>
            <td><?php echo $principal_fname; ?></td>
            <td><?php echo $principal_mname; ?></td>
            <td><?php echo $principal_lname; ?></td>
            <td><?php echo $company_initials; ?></td>
            <td><?php echo $principal_bday; ?></td>
            <td><?php echo getAge($principal_bday); ?></td>
            <td><?php echo $principal_gender; ?></td>
            <td><a href="../php/add-to-batch.php?type=Principal&batchid=<?php echo $getbatchid; ?>&companyid=<?php echo $companyid; ?>&clientid=<?php echo $principalid; ?>" class="btn btn-sml btn-primary">Add</a></td>
            <?php

            echo '</tr>';



            }


            $result3 = mysqli_query($con,"
                        SELECT * 
                            FROM dependents");
            

            while($row3 = mysqli_fetch_array($result3))
            {
                $depid = $row3['depid'];
                $dep_fname = $row3['dep_fname'];
                $dep_mname = $row3['dep_mname'];
                $dep_lname = $row3['dep_lname'];
                $dep_bday = $row3['dep_bday'];
                $dep_age = $row3['dep_age'];
                $dep_gender = $row3['dep_gender'];
                $companyid = $row3['companyid'];
                $dep_memberid = $row3['dep_memberid'];

                $result4 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row4 = mysqli_fetch_array($result4))
                {
                    $company_initials = $row4['company_initials'];
                }
            ?>
            <tr>
            <td><?php echo $dep_memberid; ?></td>
            <td>Dependent</td>
            <td><?php echo $dep_fname; ?></td>
            <td><?php echo $dep_mname; ?></td>
            <td><?php echo $dep_lname; ?></td>
            <td><?php echo $company_initials; ?></td>
            <td><?php echo $dep_bday; ?></td>
            <td><?php echo getAge($dep_bday); ?></td>
            <td><?php echo $dep_gender; ?></td>
            <td><a href="../php/add-to-batch.php?type=Dependent&batchid=<?php echo $getbatchid; ?>&companyid=<?php echo $companyid; ?>&clientid=<?php echo $depid; ?>" class="btn btn-sml btn-primary">Add</a></td>
            <?php

            echo '</tr>';



            }
            ?>
      


        </tbody>
    </table>