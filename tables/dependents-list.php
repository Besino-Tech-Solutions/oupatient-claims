<?php 



?>


<LEGEND>List of Dependents</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Relation</th>
                <th>Status</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            $getid = $_GET['id'];

            require_once '../php/conn.php';
            $result = mysqli_query($con,"
                        SELECT * 
                            FROM dependents
                                WHERE principalid='$getid'");
            

            while($row = mysqli_fetch_array($result))
            {
                echo '<tr>';

                $depid = $row['depid'];
                $dep_fname = $row['dep_fname'];
                $dep_mname = $row['dep_mname'];
                $dep_lname = $row['dep_lname'];
                $dep_bday = $row['dep_bday'];
                $dep_relation    = $row['dep_relation'];
                $status    = $row['status'];

                $dep_age = getAge($dep_bday);
                
            ?>

            <td><?php echo $dep_fname; ?></td>
            <td><?php echo $dep_mname; ?></td>
            <td><?php echo $dep_lname; ?></td>
            <td><?php echo $dep_bday; ?></td>
            <td><?php echo $dep_age; ?></td>
            <td><?php echo $dep_relation; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <button onclick="#" class="btn btn-sml btn-success">Edit</button> 
                <button onclick="#" class="btn btn-sml btn-danger">Delete</button>
            </td>

            <?php

            echo '</tr>';


            }   
            ?>
      


        </tbody>
    </table>