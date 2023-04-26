<?php
    require_once 'config.php';
    $merchid = $_GET['merchant_id'];

    $merchant = mysqli_fetch_assoc($conn->query("SELECT * FROM merchant WHERE id = '$merchid';"));
    $pr = $conn->query("SELECT * FROM product WHERE merchant_id = '$merchid';");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="/styles/shop.css">
    <title>Spice Boy</title>
</head>
<body>
    <div class="header">
        <div class="left">
            <img src="/merch-icon/<?= $merchant['image'];?>" class="merch-icon">
            <span><?= $merchant['brand'];?></span>
        </div>
        <div class="right">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
              
            </ul>
        </div>
        <div class="end">
            <img src="delivery-man.png" class="spice-icon">
            <p>Spice Boy</p>
        </div>
    </div>
    <div class="product">
        <?php while($product = mysqli_fetch_assoc($pr)) : ?>
        <div>
           <img src="product-img/<?=$product['image']; ?>" class="product-icon">
           <div>
            <span><?= $product['product_name']; ?></span>
            <p><?= $product['price'];?></p>
            <input type="submit" value="Order Now" name="ordered" class="order-btn">
           </div>
        </div>
      <?php endwhile ; ?>
</body>
</html>
