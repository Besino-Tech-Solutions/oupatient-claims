


<LEGEND>List of Bank Accounts</LEGEND>

    <table width="100%" cellspacing="0" id="tablelist" class="table table-hover">
        <thead>
            <tr>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody> 
        
        <?php
            $getid = $_GET['id'];

            require_once '../php/conn.php';
            $resultbank1 = mysqli_query($con,"SELECT * FROM bank_accounts WHERE principalid='$getid'");
            

            while($rowbank1 = mysqli_fetch_array($resultbank1))
            {
                echo '<tr>';

                $accountid = $rowbank1['accountid'];
                $bank = $rowbank1['bank'];
                $acct_number = $rowbank1['acct_number'];
                $status = $rowbank1['status'];
                
            ?>

            <td><?php echo $bank; ?></td>
            <td><?php echo $acct_number; ?></td>
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