<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="stylehome.css">
</head>
<body>
     <div class="welcome">
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
     </div>
    <div class="container">
          <div class="card">
               <div class="circle">
                    <h2>01</h2>
               </div>
               <div class="content">
                    <p>ROOM</p>
                    <a href="formrent.php">GO</a>
               </div>
          </div>
          <div class="card">
               <div class="circle">
                    <h2>02</h2>
               </div>
               <div class="content">
                    <p>TENANT</p>
                    <a href="datatenant1.php">GO</a>
               </div>
          </div>
          <div class="card">
               <div class="circle">
                    <h2>03</h2>
               </div>
               <div class="content">
                    <p>INVOICE</p>
                    <a href="insertinv.php">GO</a>
               </div>
          </div>
     </div>
    <button><a href="logout.php">Logout</a></button>
</body>
</html>