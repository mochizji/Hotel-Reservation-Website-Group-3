<?php
 include 'config.php';
    $id=$_REQUEST['invoice_id'];

    $query = "SELECT * from invoice where invoice_id=$id";
    $result = mysqli_query($con, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
?>

            <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $id=$_REQUEST['invoice_id'];
    $book=$_REQUEST['book_id'];
    $status=$_REQUEST['status'];

$update="UPDATE invoice SET
book_id='$book',
status='$status',
date='$date'
WHERE invoice_id='$id'";

mysqli_query($con, $update) or die(mysqli_error());

$status = header('location:invoicee.php');

echo $status;
}else {

    ?>

    <form name="form" method="post" action="">
        <input type="hidden" name="new" value="1" />

        <input name="invoice_id" type="hidden" value="<?php echo $row['invoice_id'];?>" />

        <p><input type="text" name="book_id" placeholder="Enter address"
        required value="<?php echo $row['book_id'];?>" /> </p>

        <p><input type="text" name="status" placeholder="Enter address"
        required value="<?php echo $row['status'];?>" /> </p>

        <p><input name="submit" type="submit" value="Update" /> </p>

    </form>

    <?php } ?>
            </ul>
