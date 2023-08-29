<?php
include_once("config.php");
 
$room_id = $_GET['room_id'];
$result = mysqli_query($con, "DELETE FROM room WHERE room_id='$room_id'");
 
header("Location:data.php");

?>