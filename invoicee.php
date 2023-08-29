<html>
	<head>
		<title>Invoice Data</title>
		<link rel = "stylesheet" href = "style.css">
		<style type = "text/css">
			h3{
				margin-left: 40%;
			}
			button{
				margin-left: 40%;
    			left : 20px;
   			 	padding:0;
    			text-align:center;
    			width:122px;
			}
			table{
				margin-left: 30%;
				margin-top: 2%;
			}
		</style>
	</head>
	<body>
	<nav>
		<label class="logo">PROJECT</label>
		<ul>
			<li><a href = "formrent.php">ROOM</a></li>
			<li><a href = "formtenant.php">TENANT</a></li>
			<li><a href = "booking1.php">BOOKING ROOM</a></li>
		</ul>
	</nav>
		<h3>List of All Invoice</h3>
		<button type = "submit"><a href="insertinv.php">Add New Invoice</a></button>
		<table border = "1" style = width="100%">
			<thead>
				<th> Invoice ID</th>
				<th> Book ID </th>
				<th> Status </th>
				<th> Date </th>
				<th> Action </th>
			</thead>

<?php
include_once("config.php");

$sql = "SELECT * FROM invoice";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {

 while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row["invoice_id"]. "</td>" . "<td>" . $row["book_id"]. "</td>";
	echo "<td>". $row["status"]. "</td>";
	echo "<td>" . $row["date"]. "</td>";
	echo "<td><a href='viewin.php?invoice_id=$row[invoice_id]'>View</a> |<a href='pdf.php?invoice_id=$row[invoice_id]'>Print</a> | <a href='editin.php?invoice_id=$row[invoice_id]'>Edit</a> | <a href='deletein.php?invoice_id=$row[invoice_id]'>Delete</a></td></tr>";
	echo "</tr>"; 
 }
} else {
 echo "0 results";
}
mysqli_close($con);
?>

		</table>
	</body>
</html>