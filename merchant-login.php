<?php
    require_once 'config.php';
    session_start();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $conn->query("SELECT * FROM merchant WHERE username ='$username';");
        if(mysqli_affected_rows($conn) > 0){
            $data = mysqli_fetch_assoc($result);
           
            if(password_verify($password,$data['password'])){
                $_SESSION['merchant_id'] = $data['id'];
                $_SESSION['merchlogin'] = true;
                header("Location: merchantpage.php");
            }
            else{
                echo"<script>alert('Incorrect Password')</script>";
            }
        }else{
            echo"<script>alert('Username not found')</script>";
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
    <link rel="stylesheet" href="/styles/mechant-log.css">
    <title>Merchant Login</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div>
            <span>Merchant Login</span>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Sign In" name="submit" class="btn">
            <a href="index.php">&larr;Back to main menu</a>
        </div>
        
    </form>
</body>
</html>