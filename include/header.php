<?php require_once("../include/initialize.php"); ?>
<?php

if (isset($_POST['submit'])) {
    $score = $_POST['highscore'];
    $user_id = $session->user_id;
    
    $sql = "SELECT score + $score FROM user  WHERE id = '$user_id'";
    $newScore = $database->query($sql);
    $newScore = $database->fetch_array($newScore);
    $newScore =  array_shift($newScore);
    $sql = "UPDATE user SET score ='$newScore' WHERE id = '$user_id'";
    $database->query($sql);
    redirect_to("index.php");
}

 ?>

<?php if(!$session->is_logged_in()){
	redirect_to("login.php");
}
?>

<!-- <!DOCTYPE html> -->
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/page.css">
    <link rel="stylesheet" type="text/css" href="../css/quiz.css">
    
</head>

<body>
    <script type='text/javascript' src='../js/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='../js/jquery.min1.js'></script>
    <script src='../js/chat.js'></script>
    <div class="header">
       <ul>
       <li><a href="../index.php"> Home </a></i></li>
           <li><a href="#"> Chat</a></i></li>
           <li><div class="dropdown vertical-menu">
            <a href="#" class="dropbtn">Message</a>
                <div class="dropdown-content">
                <a href="#">Message</a>
                <a href="#">Message</a>
                
            </div></li>
           <li><a href="#coming.php"> About us</a></li>
           
           <li id="logout"><a href="../include/logout.php" >Logout</a></li>
       </ul>
    </div>
    <div class="left_pane">
         <div class="vertical-menu" >
             <h3>Too Important To MISS!</h3>
            <a href="#">Message</a>
            <div class="dropdown vertical-menu">
            <a href="#" class="dropbtn">General Knowledge</a>
                <div class="dropdown-content">
                <a href="#">Message</a>
                <a href="g#">Message</a>
                
            </div>
            </div> 
        </div>
    </div>