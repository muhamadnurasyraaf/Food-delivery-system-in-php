<?php 
    require_once("config.php");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        
        $check = mysqli_fetch_assoc($conn->query("SELECT * from user WHERE email = '$email';"));

        if(!$check){
            if($password === $password1)
            {
                $encryptedpassword = password_hash($password1,PASSWORD_DEFAULT);
                $sql = "INSERT INTO user(fullname,username,email,password) VALUES ('$name','$username','$email','$encryptedpassword');";
                $conn->query($sql);
                echo"<script>isregistered = true;</script>";
                header("Location: index.html");
            }
            else{
                echo "
                <script>
                    alert('password not match');
                    document.location.href = 'register.html';
                </script>
                
                ";
            }
        }else{
            
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
    <link rel="stylesheet" href="/styles/register.css">
    <script src="index.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="logo">
        <img src="delivery-man.png" class="icon">
        <h1>Spice Boy</h1>
    </div>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <div class="container">

            <div >
                <label for="name">Full Name</label>
                <input type="text" name="name" placeholder="mike tyson.." required autocomplete="off">
            </div>

           <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="mikey03.." id="username" required autocomplete="off">
           </div>

            <div >
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="name@email.com" required autocomplete="off">
            </div>
            
            <div >
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass" placeholder="password" required>
            </div>

            <div >
                <label for="pass2">Password</label>
                <input type="password" name="password1" id="pass2" placeholder="password confirmation" required>
            </div>

            <input type="submit" value="Sign Up" name="submit" class="submit-btn">
            <p>Have an account already ? <a href="/login.html">Login</a></p>
           
        </div>
        
    </form>

    <style>
        
    </style>
</body>
</html>