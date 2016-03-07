<LEGEND>List of Condition</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Condition Name</th>
                <th>Condition Remarks</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM conditions");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $condition_name = $row['condition_name'];
                $conditionid = $row['conditionid'];
                $condition_remarks = $row['condition_remarks'];

              
              
            ?>

            <td><?php echo $condition_name; ?></td>
            <td><?php echo $condition_remarks; ?></td>
            <?php

            echo '</tr>';



            }
            mysqli_close($con);
            ?>
      


        </tbody>
    </table>