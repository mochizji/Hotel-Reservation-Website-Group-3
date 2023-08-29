<?php
 include 'config.php';
 $id=$_REQUEST['invoice_id'];
$inv=mysqli_query($con, "SELECT * FROM invoice WHERE invoice_id='$id'");

foreach ($inv as $row):
    $book=$row['book_id'];
    $bk=mysqli_query($con, "SELECT * FROM booking WHERE book_id='$book'");

foreach ($bk as $row):
    $room=$row['room_id'];
    $tenant=$row['tenant_id'];
$rm=mysqli_query($con, "SELECT * FROM room WHERE room_id='$room'");
$tn=mysqli_query($con, "SELECT * FROM tenant WHERE tenant_id='$tenant'");
endforeach;
endforeach;

?>
<table>
        <tr>
            <td>
            <h1 style="margin-left:2em">
                <img src="../img/logo1.png" alt="" style="width:4%">
            Invoice</h1>
            </td>
            <td>
            </td>
        </tr>
    </table>
    <table width="600px" style="margin-left:5em">
        <tr>
            <td>
                <?php foreach ($inv as $row): ?>
                <b> Invoice ID: </b><br> <?= $row['invoice_id'];?>
                <?php endforeach;?>
            </td>
            <td>
                <?php foreach ($inv as $row):?>
                <b>Date:</b> <br>
                <?= $row['date']; endforeach;?>
            </td>
        </tr>
        <tr><td>
            <br>
        </td></tr>
        <tr>
            <td>
                <?php foreach ($tn as $row): ?>
                <b>Billed to:</b> <br>
                <?= $row['tenant_name'];?>
                <br>
                <?= $row['tenant_address'];?>
                <br>
                <?= $row['tenant_phone'];?>
                <?php endforeach ?>
            </td>
            <td>
                <b>Kost Wisma Q2</b> <br>
                Jl.Dusun Cibeber blok 1<br>
                0812-9129-3500<br>
                wismakost@gmail.com <br>
            </td>
        </tr>
    </table>
    <br>
    <table width="600px" style="margin-left:5em" border="1px">
        <tr>
            <th>
                Room
            </th>
            <th>
                Price/Month
            </th>
            <th>
              Status
            </th>
            <th>
                Start
            </th>
            <th>
                End
            </th>
            <th>
                Month
            </th>
            <th>
                Total
            </th>
        </tr>
        <tr>
            <td>
                <?php foreach ($rm as $row):
                    echo $row['room_label']," ", $row['room_id'];
                endforeach; ?>
            </td>
            <td>
                <?php foreach ($rm as $row):
                    echo $row['room_monthly_price'];
                endforeach?>
            </td>
            <td>
              <?php foreach ($inv as $row):
                echo $row['status'];
              endforeach;?>
            </td>
            <td>
                <?php foreach ($bk as $row):
                    echo $row['book_start_date'];
                endforeach?>
            </td>
            <td>
                <?php foreach ($bk as $row):
                    echo $row['book_end_date'];
                endforeach?>
            </td>
            <td>
                <?php foreach ($bk as $row):
                        $booking    =new DateTime($row['book_start_date']);
                        $today        =new DateTime($row['book_end_date']);
                        $diff         =$today->diff($booking);
                        echo $diff->m;
                        $month=$diff->m;
                endforeach;?>
            </td>
            <td>
                <?php foreach ($rm as $row):
                $total=(int)$row['room_monthly_price']*$month;
                echo $total;
                endforeach;?>
            </td>
        </tr>
        <tr>
            <th colspan="5">
                Total:
            </th>
            <td>
                <?php echo "$total" ?>
            </td>
        </tr>
    </table>
    <p style="margin-left:5em">
        <b>Terms and Condition:</b><br>
        Thanks for ordering the room. Please send payment within 7 days of recieving this invoice. <br>
        There will be a 1% per day on late invoices.
    </p>
