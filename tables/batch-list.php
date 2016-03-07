<LEGEND>List of Batches</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Batch No.</th>
                <th>Company ID</th>
                <th>Remarks</th>
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
                            FROM batches");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $batch_number = $row['batch_number'];
                $companyid = $row['companyid'];
                $remarks = $row['remarks'];
                $created_by = $row['created_by'];
                $date_created = $row['date_created'];
                $updated_by = $row['updated_by'];
                $date_updated = $row['date_updated'];

                $result1 = mysqli_query($con,"
                        SELECT * 
                            FROM assured_company
                                WHERE companyid='$companyid'");
            

                while($row1 = mysqli_fetch_array($result1))
                {
                    $company_initials = $row1['company_initials'];
                }
              
            ?>

            <td><?php echo $batch_number; ?></td>
            <td><?php echo $company_initials; ?></td>
            <td><?php echo $remarks; ?></td>
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