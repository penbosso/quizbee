<?php include('../include/header.php'); ?>
    <div class="centre_pane">
        <div id='container'>
			<div id='title'>
				<h1> General Knowledge 1 </h1>
			</div>
			  <div id='quiz'>
				  <form action="gen1.php" method="post">
					  <p>Score:<input name="highscore" id="score_box" readonly/></p>
					</form>
				</div>
    		<button class='' id='next'>Next</a></button>
    		<button class='' id='start'> Start Over</a></button>
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
    <script  src="../js/gen1.js"></script>
<?php include('../include/footer.php'); ?>