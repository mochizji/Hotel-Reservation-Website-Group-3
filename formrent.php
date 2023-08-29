<html>
	<head>
		<title> Room Rent Form </title>
		<link rel = "stylesheet" href = "style.css">
		<style type = "text/css">
            .hello{
                font-family: monospace;
                font-size: 20px;
                margin-left: 40%;
            }
            form.frame {
                background:#FEF8D4;
                border:3px dashed #74737A;
                border-radius:7px;
                box-shadow:#565 0 3px 3px;
                margin: 10% 30% 0% 30%;
                padding:6px;
                position:relative;
                width:450px;
            }
            form.frame2 fieldset {
    			background:#F6F7FB;
    			border:1px dashed #74737A;
   				border-radius:5px;
    			margin:0;
    			padding:0;
    			position:relative;
			}
			button {
    			margin-left: 70%;
    			left : 20px;
   			 	padding:0;
    			text-align:center;
    			width:100px;
    		}
        </style>
	</head>

	<body>
	<nav>
		<label class="logo">WISMA Q2</label>
		<ul>
			<li><a href="home.php">HOME</a></li>
		</ul>
	</nav>
		<form class = "frame" action="formrent.php" method = "post">
		<p class = "hello">Room Rent</p>
		<fieldset>
			<table>
				<tr>
					<td>Room ID</td>
					<td><input type = "text" name = "room_id" required /></td>
				</tr>
				<tr>
					<td>Room Label</td>
					<td><input type = "text" name = "room_label" required /></td>
				</tr>
			
				<tr>
					<td>Room Location</td>
					<td>
						<select name = "room_location" required>
							<option value = "1st floor">1st floor</option>
							<option value = "2nd floor">2nd floor</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Room Gender</td>
					<td>
						<input type = "radio" name = "room_gender" value = "Male" required>Male</input>
						<input type="radio" name="room_gender" value = "Female" required>Female</input>
					</td>
				</tr>

				<tr>
					<td>Room Window</td>
					<td>
						<select name = "room_window" required>
							<option value = "Outside">Outside</option>
							<option value = "Swimming Pool">Swimming Pool</option>
							<option value = "Balcone">Balcone</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Room Monthly Price</td>
					<td>
						<select name = "room_monthly_price" required>
							<option value = "1500000">Rp 1.500.000</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Room Availability</td>
					<td>
						<input type = "radio" name = "room_availability" value = "Available" required>Available</input>
						<input type = "radio" name = "room_availability" value = "Occupied" required>Occupied</input>
					</td>
				</tr>
		
				<tr>
					<td>Room Description</td>
					<td><input type = "text" name = "room_description" required /></td>
				</tr>
			</table>
		</fieldset>
		<p class = "button">
			<button type="submit">Submit</button>
		</p>
		<p class = "button">
			<button type = "submit"><a href="data.php">View All Rooms </a></button>
		</p>
	 </form>
	</body>
</html>

<?php 
include_once("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
$roomid = $_POST['room_id'];
$roomlabel = $_POST['room_label'];
$roomloc = $_POST['room_location'];
$roomgen = $_POST['room_gender'];
$roomwin = $_POST['room_window'];
$roommonthly = $_POST['room_monthly_price'];
$roomavail = $_POST['room_availability'];
$roomdesc = $_POST['room_description'];

    $insert = "INSERT INTO room VALUES ('$roomid', '$roomlabel', '$roomloc', '$roomgen', '$roomwin', '$roommonthly', '$roomavail', '$roomdesc')";
    $sql = mysqli_query($con, $insert);


    if($sql){
        header("Location: data.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

