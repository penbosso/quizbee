<?php
require_once('initialize.php');
// $_SESSION['user_id'] = $user_id;
// $sql = "UPDATE user SET status ='offline' WHERE id = '$user_id'";
// $database->query($sql);
// log_action("logout", " user id-> '$user_id'");
$session->logout();
redirect_to("../page/login.php");
?>
