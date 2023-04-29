<?php
    session_start();
    include_once 'config.php';
    if(isset($_SESSION['merchlogin']) && isset($_SESSION['merchant_id'])){
        $merchid = $_SESSION['merchant_id'];
        $orders = $conn->query("SELECT * FROM orderdetails WHERE merchant_id = '$merchid';");
    }else{
        header("Location: merchant-login.php");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="/styles/order.css">
    <title>Orders</title>
</head>
<body>
    <div class="navbar">
        <div class="parent">
            <div class="first">
                <img src="delivery-man.png" class="spice-icon">
                <p>Spice Boy</p>
            </div>
            <div class="btns">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">About</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="order-column">
        <?php while($data = mysqli_fetch_assoc($orders)) : ?>
        <div class="order">
            <h3>Order ID : <?= $data['id']; ?></h3>
            <div>Receiver Name : <?= $data['receiver_name'];?></div>
            <div>Product : <?= $data['product'];?></div>
            <h4>Address</h4>
            <div>Address Line 1 : <?= $data['address_line1'];?></div>
            <div>Address Line 2 : <?= $data['address_line2'];?></div>
            <div>PostCode : <?= $data['postcode'];?></div>
            <div>Area : <?= $data['area'];?></div>
            <div>State : <?= $data['state'];?></div>
            <div>Country : <?= $data['country'];?></div>
        </div>
        <?php endwhile; ?>
    </div>
   
</body>
</html>