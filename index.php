<?php session_start(); 
    if(isset($_SESSION['merchlogin'])){
        header("Location: merchantpage.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Open+Sans:wght@400;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Spice Boy</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="delivery-man.png" class="logo-icon">
            <p>Spice Boy</p>
        </div>
        <div class="mid">
            <li><a href="#land">Home</a></li>
            <li><a href="store.php">Stores</a></li>
            <li><a href="#">About</a></li>
            <div class="right">
                <a href="#" class="cart"> <img src="shopping-bag.png" class="bag"></a>

                <div class="user">
                    <?= isset($_SESSION['login']) ?' <a href="userprofile.php" style ="transform:translateX(120px)"; id="profile"> <img src="icons/user.png" class="user-icon"> </a>': '<a href="/login.php" class="login-btn" id="login-btn">Login/Register</a>' ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="landing" id="land">
      <div class="seller-registration">
        <p>Do you own a restaurant?You can use our platform to grow your bussiness</p>
            <form action="merchant-reg.php" method="post" class="in">
                <input type="text" name="brand" placeholder="Your food brand..." class="brand-text" autocomplete="off">
                <input type="submit" name="submit" class="submit-btn" id="mySubmit" value="Sign Up">
            </form>
      </div>
    </div>
    <hr>
    <div class="promo">
        <h1>Ramadan Promo by <span>Spice Boy</span></h1>
        <div class="food">
            <div class="desc">
                <a href="shop.php?merchant_id=8"><img src="product-img/burgerking.webp" class="img promo-img"></a>
                <div class="d">
                    <h4>Burger King - KL Sentral</h4>
                    <p>Halal, Western, Fast Food, Burgers, Grill</p>
                    <div class="rating">
                        <img src="icons/star.png" class="icon">
                        <p>4.1</p>
                        <img src="icons/time.png" class="icon">
                        <p>45 mins &#183; 5.4km</p>    
                    </div>
                    <div class="offer">
                        <img src="icons/gift-voucher.png" class="icon">
                        <p>RM13.90 Items</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="desc">
                <a href="shop.php?merchant_id=7"><img src="product-img/kfc.webp" class="img promo-img"></a>
                <div class="d">
                    <h4>KFC - Permata Complex</h4>
                    <p>Burgers, Chicken, Fast Food, Fried Chicken</p>
                    <div class="rating">
                        <img src="icons/star.png" class="icon">
                        <p>3.7</p>
                        <img src="icons/time.png" class="icon">
                        <p>40 mins &#183; 4km</p>    
                    </div>
                    <div class="offer">
                        <img src="icons/gift-voucher.png" class="icon">
                        <p>Up to 30% Off(up to RM5.50) with a min spend of RM25.Limited time only!</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="desc">
                <a href="shop.php?merchant_id=9"><img src="product-img/mawar.webp" class="img promo-img"></a>
                <div class="d">
                    <h4>Mawar Merah Catering [&] Services - Tun Tan Cheng Lock</h4>
                    <p>Local, Malaysian,Rice</p>
                    <div class="rating">
                        <img src="icons/star.png" class="icon">
                        <p>4.5</p>
                        <img src="icons/time.png" class="icon">
                        <p>35 mins &#183; 42km</p>    
                    </div>
                    <div class="offer">
                        <img src="icons/gift-voucher.png" class="icon">
                        <p>Self Pick-Up promo.5% Off (code PICKUP5).Special 30% Off for new self pick-up users(code NEW2PICKUP).No min spend.</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="desc">
                <a href="shop.php?merchant_id=6"><img src="product-img/mcd.webp" class="img promo-img"></a>
                <div class="d">
                    <h4>McDonald's -  M2 Mall 285</h4>
                    <p>Halal, McDelivery Prices , Burgers , Fast Food ,Fried Chicken</p>
                    <div class="rating">
                        <img src="icons/star.png" class="icon">
                        <p>4.5</p>
                        <img src="icons/time.png" class="icon">
                        <p>35 mins &#183; 4.2km</p>    
                    </div>
                    <div class="offer">
                        <img src="icons/gift-voucher.png" class="icon">
                        <p>Up to 30% Off(up to RM5.50) with a min spend of RM25.Limited time only!</p>
                    </div>
                    
                </div>
               
            </div>
            
        </div>
    </div>
    <a href="#" class="all-promo">See All Promotions</a>
    <div class="category">
        <!--first row-->
        <div class="row">
            <div>
                <a href=""><img src="product-img/fastfood.webp" class="cat-icon"></a>
                <p>Fast Food</p>
            </div>
    
            <div>
                <a href=""><img src="product-img/featured.webp" class="cat-icon"></a>
                <p>Featured</p>
            </div>
    
            <div>
                <a href=""><img src="product-img/western.webp" class="cat-icon"></a>
                <p>Western</p>
            </div>
    
            <div>
                <a href=""><img src="product-img/noodles.webp" class="cat-icon"></a>
                <p>Noodles</p>
            </div>
        </div>
        

        <!--Second Row-->
        <div class="row">
            <div>
                <a href=""><img src="product-img/snack.webp" class="cat-icon"></a>
                <p>Snack</p>
            </div>
    
            <div>
                <a href=""><img src="product-img/rice.webp" class="cat-icon"></a>
                <p>Rice</p>
            </div>
    
            <div>
               <a href=""><img src="product-img/local.webp" class="local"></a>
               <p>Local</p>
            </div>
    
            <div>
                <a href=""><img src="product-img/coffee.webp" class="cat-icon"></a>
                <p>Coffee</p>
            </div>
        </div>

        <div class="row">
            <div>
            <a href=""><img src="product-img/bubbletea.webp" class="local"></a>
            <p>Bubble Tea</p>
            </div>  

            <div>
                <a href=""><img src="product-img/halal.webp" alt=""></a>
                <p>Halal</p>
            </div>
        </div>
    </div>

    <div class="prefooter">
        <h1>Why Spiceboy?</h1>
            <div>&check;<span>Quickest</span> - Spice Boy provides the fastest food delivery.</div>
            <div>&check;<span>Easiest</span> - Now grabbing your food is just a few clicks or taps away.</div>
            <div>&check;<span>Food for all cravings</span> - From local fare to restaurant favourites,our wide selection of food will definitely satisfy all your cravings.</div>
            <div>&check;<span>Pay with ease</span> - It's easy to get your meals delivered to you.It's even easier to pay for it with SpicePay</div>
            <div>&check;<span>More Rewarding</span> - earn SpiceRewards points for every order you make and use them to redeem more goodies</div>
    </div>

    <div class="footer">
        <div>
            <div class="about">
                <li><a href="">About Spice Boy</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About Developer</a></li>
            </div>
            <div class="support">
                <li><a href="">Help</a></li>
                <li><a href="">FAQs</a></li>
                <li><a href="">Be a SpiceBoy Merchant</a></li>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>