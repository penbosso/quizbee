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
    <script src='../js/jquery.min1.js'></script>
    <div class="header">
       <ul>
           <li><a href="index.php"> Home</a></i></li>
           <li><a href="about.html"> About us</a></li>
           <li><a href="about.html"> Learning center</a></li>
           <li id="logout"><a href="../include/logout.php" >Logout</a></li>
       </ul>
    </div>
    <div class="left_pane">
         <div class="vertical-menu" >
             <h3>Click To Take a Quiz</h3>
            <a href="webtech.php" >Web Technology</a>
            <a href="math.php">Mathematics</a>
            <a href="science.php">Science</a>
            <a href="english.php">English</a>
            <div class="dropdown vertical-menu">
            <a href="#" class="dropbtn">General Knowledge</a>
                <div class="dropdown-content">
                <a href="gen1.php">General Knowledge 1</a>
                <a href="gen2.php">General Knowledge 2</a>
                
                </div>
            </div> 
        </div>
    </div>