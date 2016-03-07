<LEGEND>List of Benefits</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Remarks</th>
                <th>Breakdown Remarks</th>
                <th>Eligible</th>
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
                            FROM benefits");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $benefitid = $row['benefitid'];
                $benefit_name = $row['benefit_name'];
                $benefit_remarks = $row['benefit_remarks'];
                $breakdown_remarks = $row['breakdown_remarks'];
                $created_by = $row['created_by'];
                $date_created = $row['date_created'];
                $updated_by = $row['updated_by'];
                $date_updated = $row['date_updated'];
                $eligible = $row['eligible'];
            
            ?>

            <td><?php echo $benefit_name; ?></td>
            <td><?php echo $benefit_remarks; ?></td>
            <td><?php echo $breakdown_remarks; ?></td>
            <td><?php echo $eligible; ?></td>
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