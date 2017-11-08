<?php include('../include/header.php'); ?>
    <div class="centre_pane">
        <div id='container'>
			<div id='title'>
				<h1> General Knowledge 2 </h1>
			</div>
			  <div id='quiz'>
				  <form action="gen1.php" method="post" id="scoreform">
                      <p>Score:<input name="highscore" id="score_box" readonly/></p>
                      <button type="submit" class='' id="submitScore"> Submit score </button>
					</form>
				</div>
    		<button class='' id='next'>Next</a></button>
    		<button class='' id='start' type="button"> Start Over</a></button>
    	</div>
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
    <script  src="../js/gen2.js"></script>
<?php include('../include/footer.php'); ?>