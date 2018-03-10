<?php 
require_once("../include/initialize.php"); 

require_once(LIB_PATH.DS.'database.php');

//get user-input from url
$text=substr($_GET["text"], 0, 254);

$user_id = $session->user_id;

$sql = "SELECT username FROM user WHERE id = $user_id";
$result = $database->query($sql);
// $i = 0;
$result   = $database->fetch_array($result);
$username = $result['username'];

//escaping is extremely important to avoid injections!
// $nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
$textEscaped =$database->escape_value($text); //escape text and limit it to 128 chars

//create query
$sql="INSERT INTO message (username, text) VALUES ('$username', '$textEscaped')";
//execute query
if ($database->query($sql)) {
    //If the query was successful
    echo "Wrote message to db";
}else{
    //If the query was NOT successful
    echo "An error occurred";
    echo $db->errno;
}

?>