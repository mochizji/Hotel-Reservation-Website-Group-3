<?php
include_once("config.php");

if(isset($_POST['update']))
{	

$room_id = $_POST['room_id'];
$roomlabel = $_POST['room_label'];
$roomloc = $_POST['room_location'];
$roomgen = $_POST['room_gender'];
$roomwin = $_POST['room_window'];
$roommonthly = $_POST['room_monthly_price'];
$roomavail = $_POST['room_availability'];
$roomdesc = $_POST['room_description'];
		
	// update user data
	$result = mysqli_query($con, "UPDATE room SET room_label='$roomlabel', room_location='$roomloc', room_gender ='$roomgen', room_window='$roomwin', room_monthly_price='$roommonthly', room_availability='$roomavail', room_description='$roomdesc' WHERE room_id='$room_id'");

	header("Location: data.php");
}
?>

<?php

$room_id = $_GET['room_id'];
$result = mysqli_query($con, "SELECT * FROM room WHERE room_id='$room_id'");
 
while($row = mysqli_fetch_assoc($result))
{
	$room_id = $row['room_id'];
	$roomlabel = $row['room_label'];
	$roomloc = $row['room_location'];
	$roomgen = $row['room_gender'];
	$roomwin = $row['room_window'];
	$roommonthly = $row['room_monthly_price'];
	$roomavail = $row['room_availability'];
	$roomdesc = $row['room_description'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
 
<body>
	<a href="data.php">Home</a>
	<br/><br/>
	
	<form name="update" method="post" action="">
		<table border="0">
				<tr> 
					<td>Room Label</td>
					<td><input type="text" name="room_label" required value="<?php echo $roomlabel;?>"></td>
				</tr>

				<tr>
					<td>Room Location</td>
					<td>
						<input type="text" name="room_location" required value="<?php echo $roomloc;?>">
					</td>
				</tr>

				<tr>
					<td>Room Gender</td>
					<td>
						<input type="text" name="room_gender" required value="<?php echo $roomgen;?>">
					</td>
				</tr>

				<tr>
					<td>Room Window</td>
					<td>
						<input type="text" name="room_window" required value="<?php echo $roomwin;?>">
					</td>
				</tr>

				<tr>
					<td>Room Monthly Price</td>
					<td>
						<input type="text" name="room_monthly_price" required value="<?php echo $roommonthly;?>">
					</td>
				</tr>

				<tr>
					<td>Room Availability</td>
					<td>
						<input type="text" name="room_availability" required value="<?php echo $roomavail;?>">
					</td>
				</tr>
		
				<tr>
					<td>Room Description</td>
					<td><input type="text" name="room_description" required value="<?php echo $roomdesc;?>"></td>
				</tr>
			<tr>
				<td><input type="hidden" name="room_id" value="<?php echo $_GET['room_id'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>