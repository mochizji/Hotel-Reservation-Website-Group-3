<?php
include 'config.php';

if (isset($_GET['invoice_id'])) {
	$id = $_GET['invoice_id'];
	mysqli_query($con, "DELETE FROM invoice WHERE invoice_id='$id'");
	header('location: invoicee.php');
}

?>
