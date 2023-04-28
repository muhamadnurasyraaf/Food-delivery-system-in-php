<?php
    include_once 'config.php';
    session_start();
    $userid = $_SESSION['id'];
    $productid = $_GET['productid'];

    $user = mysqli_fetch_assoc($conn->query("SELECT * FROM user WHERE id = '$userid';"));
    $product = mysqli_fetch_assoc($conn->query("SELECT * FROM product WHERE id = '$productid';"));
    $address = mysqli_fetch_assoc($conn->query("SELECT * FROM address WHERE user_id = '$userid';"));
    
    $merchant_id = $product['merchant_id'];
    $receiver_name = $user['fullname'];
    $product_name = $product['product_name'];
    $address_line1 = $address['address_line1'];
    $address_line2 = $address['address_line2'];
    $postcode = $address['postcode'];
    $area = $address['area'];
    $state = $address['state'];
    $country = $address['country'];
    $total = $product['price'];

    $order = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) FROM orderdetails;"));
    $count = (int)$order;
    $orderid = $count;
    
    if(isset($_POST['checkout'])){
        $result = $conn->query("INSERT INTO orderdetails(user_id,merchant_id,receiver_name,product,address_line1,address_line2,postcode,area,state,country,total) VALUES('$userid','$merchant_id','$receiver_name','$product_name','$address_line1','$address_line2','$postcode','$area','$state','$country','$total');");
        if($result){
            header("Location: index.php");
        }
        else{
            $message = mysqli_error($conn);
            echo "
                alert(
                    'failed to checkout : $message'
                );
            ";
        }
    }
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/checkout.css">
    <title>Checkout Order</title>
</head>
<body>
    <div class="nav"><img src="delivery-man.png" class="spice-icon"> <p>Spice Boy</p></div>
    <div class="container">
        <h3>Your Order Details</h3>
        <div><span>Order ID : </span><?= is_null($orderid) ? 1 :$orderid?></div>
        <div><span>Receiver Name : </span><?= $user['fullname'];?></div>
        <div><span>Product : </span><?= $product['product_name'];?></div>
        <div class="add">Address</div>
        <div><span>Address Line 1 : </span><?= $address['address_line1'];?></div>
        <div><span>Address Line 2 : </span><?= $address['address_line2'];?></div> <!--order table = order id,product id,user id,total-->
        <div><span>PostCode : </span><?= $address['postcode'];?></div>
        <div><span>Area : </span><?= $address['area'];?></div>
        <div><span>State : </span><?= $address['state'];?></div>
        <div><span>Country : </span><?= $address['country'];?></div>
        <div><span>Total : </span>RM<?= $product['price']; ?></div>
        <div><span>Payment Option : </span>Cash</div>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" value="Checkout" name="checkout" class="checkout-btn">
        </form>
    </div>
</body>
</html>