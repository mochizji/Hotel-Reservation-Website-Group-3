<?php
include_once("config.php");

if(isset($_POST['update']))
{	

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
		
	// update user data
	$result = mysqli_query($con, "UPDATE tenant SET tenant_id='$tenantid', tenant_name='$tenantname', tenant_address ='$tenantadd', tenant_ktp_no='$tenantktpno', tenant_phone='$tenantphone', tenant_email='$tenantemail', tenant_emergcp='$emergcp', tenant_emergcp_phone='$emergcpphone', tenant_emergcp_email='$emergcpemail', tenant_bankaccount='$bankacc', tenant_bankaccount_no='$bankaccno' WHERE tenant_id='$tenantid'");

	header("Location: datatenant1.php");
}
?>

<?php

$tenantid = $_GET['tenant_id'];
$result = mysqli_query($con, "SELECT * FROM tenant WHERE tenant_id='$tenantid'");
 
while($row = mysqli_fetch_assoc($result))
{
	$tenantid = $row['tenant_id'];
	$tenantname = $row['tenant_name'];
	$tenantadd = $row['tenant_address'];
	$tenantktpno = $row['tenant_ktp_no'];
	$tenantphone = $row['tenant_phone'];
	$tenantemail = $row['tenant_email'];
	$emergcp = $row['tenant_emergcp'];
	$emergcpphone = $row['tenant_emergcp_phone'];
	$emergcpemail = $row['tenant_emergcp_email'];
	$bankacc = $row['tenant_bankaccount'];
	$bankaccno = $row['tenant_bankaccount_no'];
}
?>

<html>
<head>	
	<title>Edit Data</title>
</head>
 
<body>
	<a href="datatenant1.php">Home</a>
	<br/><br/>
	
	<form name="update" method="post" action="">
		<table border="0">
				<tr> 
					<td>Tenant ID</td>
					<td><input type = "text" name = "tenant_id" required value="<?php echo $tenantid;?>"></td>
				</tr>

				<tr>
					<td>Tenant Name</td>
					<td><input type = "text" name = "tenant_name" required value="<?php echo $tenantname;?>">
					</td>
				</tr>

				<tr>
					<td>Tenant Address</td>
					<td><input type = "text" name = "tenant_address" required value="<?php echo $tenantadd;?>">
					</td>
				</tr>

				<tr>
					<td>Tenant KTP Number</td>
					<td><input type = "text" name = "tenant_ktp_no" required value="<?php echo $tenantktpno;?>">
					</td>
				</tr>

				<tr>
					<td>Tenant Phone</td>
					<td><input type = "text" name = "tenant_phone" required value="<?php echo $tenantphone;?>">
					</td>
				</tr>

				<tr>
					<td>Tenant Email</td>
					<td><input type = "text" name = "tenant_email" required value="<?php echo $tenantemail;?>">
					</td>
				</tr>
		
				<tr>
					<td>Tenant Emergency CP</td>
					<td><input type = "text" name = "tenant_emergcp" required value="<?php echo $emergcp;?>"></td>
				</tr>

				<tr>
					<td>Tenant Emergency CP Phone</td>
					<td><input type = "text" name = "tenant_emergcp_phone" required value="<?php echo $emergcpphone;?>"></td>
				</tr>

				<tr>
					<td>Tenant Emergency CP Email</td>
					<td><input type = "text" name = "tenant_emergcp_email" required value="<?php echo $emergcpemail;?>"></td>
				</tr>

				<tr>
					<td>Tenant Bank Account</td>
					<td><input type = "text" name = "tenant_bankaccount" required value="<?php echo $bankacc;?>"></td>
				</tr>

				<tr>
					<td>Tenant Bank Account Number</td>
					<td><input type = "text" name = "tenant_bankaccount_no" required value="<?php echo $bankaccno;?>"></td>
				</tr>
			<tr>
				<td><input type="hidden" name="tenant_id" value="<?php echo $_GET['tenant_id'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>