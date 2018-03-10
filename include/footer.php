    <div class="right_pane">
        <table>
            <tr >
                <th id="leadership" colspan="3"> lEADERSHIP BOARD </th>
            </tr>
            <tr>
                <td> USERNAME </td>
                <td> STATUS </td>
            </tr>
            <?php
        $sql = "SELECT username, status FROM user ";
        $result = $database->query($sql);
        // $i = 0;
        while ($row = $database->fetch_array($result)) {
            // ++$i;
            //$acc = $row['client_number'];
            
            $username = $row['username'];
            $status = $row['status'];
            // if (!empty($status)) {
            //     $account = array_shift($account);
            // } else {
            //     $account="";
            // } 
            ?>
		<tr>
		<td><?php echo $username; ?></td>
		<td><?php echo "<div id=".$status."></div>"; ?></td>
		</tr>
		<?php
        }
         ?>
        </table>
    </div>
    <div class="footer">2017 (c) all Rights reserved </div>    
</body>
</html>