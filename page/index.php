<?php include('../include/header.php'); ?>
    <div class="centre_pane">

        //sticky


    </div>
    <div class="right_pane">
        <table>
            <tr colspan="2">
                <th id="leadership"> Leadership Board </th>
            </tr>
            <tr>
                <td> Username </td>
                <td> Score </td>
            </tr>
        </table>
    </div>
<?php include('../include/footer.php'); ?>



    <!-- <script>
        var seconds = 60;

        function secondPassed() {
            var minutes = Math.round((seconds - 30) / 60);
            var remainingSeconds = seconds % 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
            }
            document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = "Buzz Buzz";
            } else {
                seconds--;
            }
        }

        var countdownTimer = setInterval('secondPassed()', 1000);
    </script> -->
