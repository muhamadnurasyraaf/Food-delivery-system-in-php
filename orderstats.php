<?php
    include_once 'config.php';
    session_start();
    $currentorderid = $_SESSION['currentorder'];


    $order = mysqli_fetch_assoc($conn->query("SELECT * FROM orderdetails WHERE id = '$currentorderid';"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/orderstats.css">
    <title>Order Status</title>
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

    <div class="details">
        <h3>Your Order Details</h3>
        <div>
            <div>Order ID : <?= $order['id'];?></div>
            <div>Receiver Name : <?= $order['receiver_name'];?></div>
            <div>Product : <?= $order['product'];?></div>
            <div>Address Line 1 : <?= $order['address_line1'];?></div>
            <div>Address Line 2 : <?= $order['address_line2'];?></div>
            <div>Postcode : <?= $order['postcode'];?></div>
            <div>Area : <?= $order['area'];?></div>
            <div>State : <?= $order['state'];?></div>
            <div>Country : <?= $order['country'];?></div>
            <div>Total : <?= $order['total'];?></div>
            <div>Status : <?=is_null($order['status']) ?'Pending': $order['status'];?></div>
        </div>
    </div>
    <div class="main-btn">&larr; <a href="index.php">Back to main menu</a></div>
</body>
</html>