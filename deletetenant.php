<?php
include_once("config.php");
 
$tenantid = $_GET['tenant_id'];
$result = mysqli_query($con, "DELETE FROM tenant WHERE tenant_id='$tenantid'");
 
header("Location:datatenant1.php");

?>