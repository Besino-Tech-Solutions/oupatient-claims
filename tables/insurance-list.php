<LEGEND>List of Insurance Company</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Initials</th>
                <th>Remarks</th> 
                <th>Address</th> 
                <th>Contact Person 1</th>
                <th>Contact No. 1</th>
                <th>Email Address 1</th>
                <th>Contact Person 2</th>
                <th>Contact No. 2</th>
                <th>Email Address 2</th>
                <th>Created By</th>
                <th>Date Created</th>
                <th>Updated By</th>
                <th>Date Updated</th>
                
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM insurance_company");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $insurance_name = $row['insurance_name'];
                $insurance_initials = $row['insurance_initials'];
                $insurance_remarks = $row['insurance_remarks'];
                $contact_person1 = $row['contact_person1'];
                $contact_person2 = $row['contact_person2'];
                $contact_no1 = $row['contact_no1'];
                $contact_no2 = $row['contact_no2'];
                $email_address1 = $row['email_address1'];
                $email_address2 = $row['email_address2'];
                $created_by = $row['created_by'];
                $date_created = $row['date_created'];
                $updated_by = $row['updated_by'];
                $date_updated = $row['date_updated'];
                $insurance_address = $row['insurance_address'];
            
            ?>

            <td><?php echo $insurance_name; ?></td>
            <td><?php echo $insurance_initials; ?></td>
            <td><?php echo $insurance_remarks; ?></td>
            <td><?php echo $insurance_address; ?></td>
            <td><?php echo $contact_person1; ?></td>
            <td><?php echo $contact_person2; ?></td>
            <td><?php echo $contact_no1; ?></td>
            <td><?php echo $contact_no2; ?></td>
            <td><?php echo $email_address1; ?></td>
            <td><?php echo $email_address2; ?></td>
            <td><?php echo $created_by; ?></td>
            <td><?php echo $date_created; ?></td>
            <td><?php echo $updated_by; ?></td>
            <td><?php echo $date_updated; ?></td>

            <?php

            echo '</tr>';



            }
            mysqli_close($con);
            ?>
      


        </tbody>
    </table>