<?php
include 'config.php';
 $book=mysqli_query($con, "SELECT * FROM booking");

 if (isset($_POST['submit'])){
     $bookid=$_POST['book_id'];
     $status=$_POST['status'];

 $sql="INSERT INTO invoice (book_id, status) VALUES ('$bookid', '$status')";

 if (mysqli_query($con, $sql)) {
     echo '<script language="javascript">
                 window.alert("Insert Success");
                 window.location.href="invoicee.php";
                     </script>';
     } else {
     echo "Error: " . $sql . ":-" . mysqli_error($con);
     }

 mysqli_close($con);
 }
?>
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
            <li><a href = "insertinv.php">PAYMENT</a></li>
            <li><a href="home.php">HOME</a></li>
        </ul>
    </nav>
    <form class = "frame" action="" method="POST">
        <table>
            <tr>
                <td>
                    Book_ID:
                </td>
                <td>
                <select name="book_id" id="">
                    <?php foreach ($book as $books): ?>
                    <option value="<?= $books['book_id'];?>">
                        <?= $books['book_id'];?>
                    </option>
                    <?php endforeach; ?>
                </select>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    Status:
                </td>
                <td>
                    <select name="status" id="">
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" value="Insert" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
