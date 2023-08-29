<html>
	<head>
		<title>Tenant Data</title>
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
		</style>
	</head>
	<body>
	<nav>
		<label class="logo">WISMA Q2</label>
		<ul>
			<li><a href = "formtenant(admin).php">TENANT</a></li>
			<li><a href="home.php">HOME</a></li>
		</ul>
	</nav>
		<h3>List of All Tenant</h3>
		<button type = "submit"><a href="formtenant.php">Add New Tenant</a></button>
		<table border = "1" style = width="100%">
			<thead>
				<th> Tenant ID </th>
				<th> Tenant Name </th>
				<th> Tenant Address </th>
				<th> Tenant KTP Number </th>
				<th> Tenant Phone </th>
				<th> Tenant Email </th>
				<th> Tenant Emergency CP </th>
				<th> Tenant Emergency CP Phone</th>
				<th> Tenant Emergency CP Email</th>
				<th> Tenant Bank Account</th>
				<th> Tenant Bank Account Number</th>
				<th> Confirm </th>
			</thead>


<?php
include_once("config.php");

$sql = "SELECT * FROM tenant";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {

 while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row["tenant_id"]. "</td>" . "<td>" . $row["tenant_name"]. "</td>";
	echo "<td>". $row["tenant_address"]. "</td>";
	echo "<td>" . $row["tenant_ktp_no"]. "</td>";
	echo "<td>". $row["tenant_phone"]. "</td>";
	echo "<td>". $row["tenant_email"]. "</td>";
	echo "<td>". $row["tenant_emergcp"]. "</td>";
	echo "<td>". $row["tenant_emergcp_phone"]. "</td>";
	echo "<td>". $row["tenant_emergcp_email"]. "</td>";
	echo "<td>". $row["tenant_bankaccount"]. "</td>";
	echo "<td>". $row["tenant_bankaccount_no"]. "</td>";
	echo "<td><a href='edittenant.php?tenant_id=$row[tenant_id]'>Edit</a> | <a href='deletetenant.php?tenant_id=$row[tenant_id]'>Delete</a></td></tr>";
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

