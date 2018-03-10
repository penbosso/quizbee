<?php require_once("../include/initialize.php"); ?>
<?php
require_once(LIB_PATH.DS.'database.php');
//connect to db
//$db = new mysqli($db_host,$db_user, $db_password, $db_name); 
// if ($db->connect_errno) {
//     //if the connection to the db failed
//     echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
// }

$query="SELECT * FROM message ORDER BY id DESC";
//execute query
if ($res = $database->query($query)) {
    //If the query was successful

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('G:i', strtotime($row["time"])); //outputs date as # #Hour#:#Minute#

        echo "<p>$time | $username: $text</p>\n";
    }
}else{
    //If the query was NOT successful
    echo "An error occured";
    echo $db->errno;
}

?>
