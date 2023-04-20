<?php 
    require_once 'config.php';
    session_start();
    $id = $_SESSION['id'];

    $data = mysqli_fetch_assoc($conn->query("SELECT * FROM user WHERE id = $id;"));
    $address = mysqli_fetch_assoc($conn->query("SELECT * FROM address WHERE user_id =$id;"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/styles/userprofile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <title>User Profile</title>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="delivery-man.png" class="logo-icon">
            <p>Spice Boy</p>
        </div>
        <div class="midnav">
            <li><a href="/index.html">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
            <div class="right">
                <a href="#" class="cart"> <img src="shopping-bag.png" class="bag"></a>
            </div>
        </div>
    </div>
    <div class="profile">
        <h3 style="font-size:24px;">User Profile</h3>
        <div class="cont">
            <div class="col first">
                <div>Full Name</div>
                <div>Username</div>
                <div>Email</div>
                <div>Password</div>
                <div></div>
                <div>Address Line 1</div>
                <div>Address Line 2</div>
                <div>Postcode</div>
                <div>Area</div>
                <div>State</div>
                <div>Country</div>
            </div>
       
            <div class="col mid">
                <div><?= $data['fullname'];?></div>
                <div><?= $data['username'];?></div>
                <div><?= $data['email'];?></div>
                <div>**Encrypted**</div>
                <div class="address-header">User Address </div>
                <div><?= is_null($address) ? 'NOT SET' : $address['address_line1']; ?></div>
                <div><?= is_null($address) ? 'NOT SET' : $address['address_line2']; ?></div>
                <div><?= is_null($address) ? 'NOT SET' : $address['postcode']; ?></div>
                <div><?= is_null($address) ? 'NOT SET' : $address['area']; ?></div>
                <div><?= is_null($address) ? 'NOT SET' : $address['state']; ?></div>
                <div><?= is_null($address) ? 'NOT SET' : $address['country']; ?></div>
            </div>
            <div class="col last">
                <div> <a href="update-profile.php" class="btn">Edit Profile</a></div>
                <div style="margin-top:400px;"> <?= is_null($address) ? '<a href="set-address.php" class="btn">Set Address</a>' :  '<a href="set-address.php" class="btn">Edit Address</a>' ;?></div>
            </div>
    </div>
       
       
    </div>
    <div class="footer">
        <div class="footer-container">
            <div class="about">
                <li><a href="">About Spice Boy</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About Developer</a></li>
            </div>
            <div class="support">
                <li><a href="">Help</a></li>
                <li><a href="">FAQs</a></li>
                <li><a href="">Be a SpiceBoy Merchant</a></li>
                <li><a href="">Drive With Grab</a></li>
            </div>
        </div>
    </div>
</body>

</html>