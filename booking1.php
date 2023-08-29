<?php
include_once("config.php");
?>

<html>
<head>
	<title>Add Booking</title>
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
			<li><a href = "formtenant.php">TENANT</a></li>
			<li><a href = "booking1.php">BOOKING ROOM</a></li>
		</ul>
	</nav>
	<form class = "frame" action="booking1.php" method="post">
	<p class = "hello">Booking Form</p>
		<fieldset>
		<table>
		<tr> 
			<td>Today's Date</td>
			<td><?php $date = date('d-m-y'); echo $date;?></td>
		</tr>
		<tr> 
			<td>Tenant Name :</td>
			<td>
				<select name="tenant_id">
					<?php
					$tenant = mysqli_query($con, "SELECT tenant_id, tenant_name FROM tenant ORDER BY tenant_name");
						$i=0;
						while($row = mysqli_fetch_array($tenant)){
					?>

				<option value="<?=$row["tenant_id"];?>"><?=$row["tenant_name"];?></option>
					<?php
						$i++;	
					}
					?>
				</select>
			</td>
		</tr>
		<tr> 
			<td>Room Name :</td>
			<td>
				<select name="room_id">
					<?php
					$room = mysqli_query($con, "SELECT room_id, room_label FROM room ORDER BY room_label");
						$i=0;
						while($row = mysqli_fetch_array($room)){
					?>

				<option value="<?=$row["room_id"];?>"><?=$row["room_label"];?></option>
					<?php
						$i++;	
					}
					?>
				</select>
			</td>
		</tr>

		<tr> 
			<td>Start Date :</td>
			<td><input type="date" name="book_start_date" required></td>
		</tr>
		<tr> 
			<td>End Date :</td>
			<td><input type="date" name="book_end_date" required></td>
		</tr>
	</table>
	</fieldset>
		<p class = "button">
			<button type="submit" name="submit">Submit</button>
		</p>
</form>

	<?php
	if(isset($_POST['submit'])){
		$tenant_id = $_POST['tenant_id'];
		$room_id = $_POST['room_id'];
		$book_start_date = $_POST['book_start_date'];
		$book_end_date = $_POST['book_end_date'];

		$check = mysqli_query($con, "SELECT * FROM booking WHERE room_id = '$room_id' AND (book_start_date AND book_end_date BETWEEN '$book_start_date' AND '$book_end_date')");

		if(mysqli_num_rows($check)>0){
			echo '<script>alert("The room and date that you choose already booked. Please choose another room and date!")</script>';
		}
		else{
			echo '<script>alert("Succesfull!!")</script>';

			$insert = mysqli_query($con, "INSERT INTO booking (room_id, tenant_id, book_start_date, book_end_date) VALUES ('$room_id', '$tenant_id', '$book_start_date', '$book_end_date')");
			$update = mysqli_query($con, "UPDATE room SET room_availability = 'Occupied' WHERE room_id ='$room_id'");
		}
	}
	?>
</body>
</html>