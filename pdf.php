<?php
require_once ("tcpdf/tcpdf.php");
include 'config.php';
$id=$_REQUEST['invoice_id'];
$inv=mysqli_query($con, "SELECT * FROM invoice WHERE invoice_id='$id'");

foreach ($inv as $row):
    $book=$row['book_id'];
endforeach;

$bk=mysqli_query($con, "SELECT * FROM booking WHERE book_id='$book'");

foreach ($bk as $row):
    $room=$row['room_id'];
    $tenant=$row['tenant_id'];
$rm=mysqli_query($con, "SELECT * FROM room WHERE room_id='$room'");
$tn=mysqli_query($con, "SELECT * FROM tenant WHERE tenant_id='$tenant'");
endforeach;


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('CozyRoom');
$pdf->setTitle('Invoice');
$pdf->setSubject('Data Customer');
$pdf->setKeywords('Data Customer');

$pdf->setFont('times', '', 11, '', true);

$pdf->addpage();


foreach ($inv as $invs):
foreach ($tn as $tns):
foreach ($rm as $rms):
foreach ($bk as $bks):
foreach ($inv as $invs):
    $booking=new DateTime($bks['book_start_date']);
    $today= new DateTime($row['book_end_date']);
    $diff=$today->diff($booking);
    $month=$diff->m;
    $total=(int)$rms['room_monthly_price']*$month;
$html="
<head>
    <style>
        h1{
        margin-left:2em;
        }
        table{
        margin-left:2em;
        width: 100%;
        }
        th{
        border-bottom: 1%;
        bordercolor: black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <h1>
                    Invoice
                </h1>
            </td>
            <td>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>
            <b> Invoice ID: </b>". $invs['invoice_id'].
            "</td>
            <td>
                <b>Date of Issue: </b>"
                .$invs['date'].
            "</td>
        </tr>
        <tr><td>
            <br>
        </td></tr>
        <tr>
            <td>
                <b>Billed to:</b><br>"
                .$tns['tenant_name']."<br>"
                .$tns['tenant_address']. "<br>"
                .$tns['tenant_phone'].
            "</td>
            <td>
            <b>Kost Wisma Q2</b> <br>
                Jl.Dusun Cibeber blok 1<br>
                0812-9129-3500<br>
                wismakost@gmail.com <br>
            </td>
        </tr>
        </table>
    <br>
    <table>
        <tr>
            <th>
                <b>Room</b>
            </th>
            <th>
                <b>Price/Month</b>
            </th>
            <th>
                <b>Status</b>
            </th>
            <th>
                <b>Start</b>
            </th>
            <th>
                <b>End</b>
            </th>
            <th>
                <b>Month</b>
            </th>
            <th>
                <b>Total</b>
            </th>
        </tr>
        <tr>
            <td>"
                .$rms['room_label']. " ". $rms['room_id'].
            "</td>
            <td>".$rms['room_monthly_price'].
            "</td>
            <td>". $invs['status'].
            "</td>
            <td>".
                $bks['book_start_date'].
            "</td>
            <td>".
                $bks['book_end_date'].
            "</td>
            <td> $month
            </td>
            <td>
                $total
            </td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td>
                <b>Grand Total:</b>
            </td>
            <td>
                Rp$total
            </td>
        </tr>
        </table>
        <p>
        <b>Terms and Condition:</b><br>
        Thanks for ordering the room. Please send payment within 7 days of recieving this invoice. <br>
        There will be a 1% per day on late invoices.
    </p>
    </body>";
endforeach;
endforeach;
endforeach;
endforeach;
endforeach;

$pdf->writeHTML($html);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('invoicee.pdf', 'I');
?>
