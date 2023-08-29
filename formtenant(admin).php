<html>
	<head>
		<title> Tenant Form </title>
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
		<form class = "frame" action="formtenant.php" method = "post">
		<p class = "hello">Tenant Form</p>
		<fieldset>
			<table>
				<tr>
					<td>Tenant ID</td>
					<td><input type = "text" name = "tenant_id" required /></td>
				</tr>
				<tr>
					<td>Tenant Name</td>
					<td><input type = "text" name = "tenant_name" required /></td>
				</tr>
			
				<tr>
					<td>Tenant Address</td>
					<td><input type = "text" name = "tenant_address" required /></td>
				</tr>

				<tr>
					<td>Tenant KTP Number</td>
					<td><input type = "text" name = "tenant_ktp_no" required /></td>
				</tr>

				<tr>
					<td>Tenant Phone</td>
					<td><input type = "text" name = "tenant_phone" required /></td>
				</tr>

				<tr>
					<td>Tenant Email</td>
					<td><input type = "text" name = "tenant_email" required /></td>
				</tr>

				<tr>
					<td>Tenant Emergency CP</td>
					<td><input type = "text" name = "tenant_emergcp" required /></td>
				</tr>
		
				<tr>
					<td>Tenant Emergency CP Phone</td>
					<td><input type = "text" name = "tenant_emergcp_phone" required /></td>
				</tr>

				<tr>
					<td>Tenant Emergency CP Email</td>
					<td><input type = "text" name = "tenant_emergcp_email" required /></td>
				</tr>

				<tr>
					<td>Tenant Bank Account</td>
					<td><input type = "text" name = "tenant_bankaccount" required /></td>
				</tr>

				<tr>
					<td>Tenant Bank Account Number</td>
					<td><input type = "text" name = "tenant_bankaccount_no" required /></td>
				</tr>
			</table>
		</fieldset>
		<p class = "button">
			<button type="submit">Submit</button>
		</p>
		<p class = "button">
			<button type = "submit"><a href="datatenant1.php">View All Rooms </a></button>
		</p>
	 </form>
	</body>
</html>


<?php 
include_once("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
$tenantid = $_POST['tenant_id'];
$tenantname = $_POST['tenant_name'];
$tenantadd = $_POST['tenant_address'];
$tenantktpno = $_POST['tenant_ktp_no'];
$tenantphone = $_POST['tenant_phone'];
$tenantemail = $_POST['tenant_email'];
$emergcp = $_POST['tenant_emergcp'];
$emergcpphone = $_POST['tenant_emergcp_phone'];
$emergcpemail = $_POST['tenant_emergcp_email'];
$bankacc = $_POST['tenant_bankaccount'];
$bankaccno = $_POST['tenant_bankaccount_no'];

    $insert = "INSERT INTO tenant VALUES ('$tenantid', '$tenantname', '$tenantadd', '$tenantktpno', '$tenantphone', '$tenantemail', '$emergcp', '$emergcpphone', '$emergcpemail', '$bankacc', '$bankaccno')";
    $sql = mysqli_query($con, $insert);


    if($sql){
        header("Location: datatenant1.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
