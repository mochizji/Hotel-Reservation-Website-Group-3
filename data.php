<html>
	<head>
		<title>Room Rent Data</title>
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
			<li><a href = "formrent.php">ROOM</a></li>
			<li><a href="home.php">HOME</a></li>
		</ul>
	</nav>
		<h3>List of All Room</h3>
		<button type = "submit"><a href="formrent.php">Add New Room</a></button>
		<table border = "1" style = width="100%">
			<thead>
				<th> Room ID </th>
				<th> Room Label </th>
				<th> Room Location </th>
				<th> Room Gender </th>
				<th> Room Window </th>
				<th> Room Monthly Price </th>
				<th> Room Availability </th>
				<th> Room Description</th>
				<th>Confirm</th>
			</thead>
			

<?php
include_once("config.php");

$sql = "SELECT * FROM room";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {

 while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row["room_id"]. "</td>" . "<td>" . $row["room_label"]. "</td>";
	echo "<td>". $row["room_location"]. "</td>";
	echo "<td>" . $row["room_gender"]. "</td>";
	echo "<td>". $row["room_window"]. "</td>";
	echo "<td>". $row["room_monthly_price"]. "</td>";
	echo "<td>". $row["room_availability"]. "</td>";
	echo "<td>". $row["room_description"]. "</td>";
	echo "<td><a href='edit.php?room_id=$row[room_id]'>Edit</a> | <a href='delete.php?room_id=$row[room_id]'>Delete</a></td></tr>";
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
