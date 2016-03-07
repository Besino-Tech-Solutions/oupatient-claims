<LEGEND>List of Doctors</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Doctor's Name</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM doctors");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $doctor_name = $row['doctor_name'];
                $doctorid = $row['doctorid'];
                $status = $row['status'];

              
              
            ?>

            <td><?php echo $doctor_name; ?></td>
            <td><?php echo $status; ?></td>
            <?php

            echo '</tr>';



            }
            mysqli_close($con);
            ?>
      


        </tbody>
    </table>