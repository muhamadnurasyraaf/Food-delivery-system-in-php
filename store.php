<?php 

    include_once 'config.php';

    $result = $conn->query("SELECT * FROM merchant;");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/store.css">
    <title>Stores</title>
</head>
<body>
    <div class="navbar">
        <div class="left">
            <img src="delivery-man.png" class="">
            <span>Spice Boy</span>
        </div>
        <div class="mid">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </div>
    <h3>Available Store : </h3>
    <div class="content">
        <?php while($data = mysqli_fetch_assoc($result)) : ?>
        <div class="merch">
            <a href="shop.php?merchant_id=<?= $data['id'];?>"><img src="merch-icon/<?= $data['image']; ?>" class="merch-icon"></a>
            <p class="merch-brand"><?= $data['brand'];?></p>
            <div>
                <p>&starf;<?= $data['rating'];?></p> 
                <p>&#x1F550;<?= $data['time'];?> mins</p>
            </div>
        </div>
       <?php endwhile; ?>
    </div>
</body>
</html>