<?php
    require_once 'config.php';
    session_start();
    if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $password = $_POST['password'];
        
       $stmt = $conn->prepare("SELECT * FROM user WHERE username = :user");
       $stmt->bindParam(":user",$username);
       $stmt->execute();
        $data = $stmt->fetch();

        if(empty($password)){
            echo "
                <script>alert('please enter your password');</script>
            ";
        }

       if($stmt->rowCount() > 0){
        if($password == $data['password']){
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = true;
            header("location: userprofile.php");
        }else{
            echo '<script> alert("Incorrect password or username);</script>';
        }
       }else{
        echo '<script> alert("invalid username");</script>';
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="/styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="logo">
        <img src="delivery-man.png" class="icon">
        <h1>Spice Boy</h1>
    </div>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
    <div class="container">
        <div class="card">
            <a class="login">Log in</a>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span class="user">Username</span>
            </div>

            <div class="inputBox">
                <input type="password" name="password">
                <span>Password</span>
            </div>

            <input type="submit" value="Enter" name="submit" class="enter">
            <p>Don't have an account? <a href="/register.php">Register</a></p>
            <p style="margin-left: 20px;">You already have a merchant? <a href="/merchant-login.php">Merchant Login</a></p>
        </div>
    </div>
</form>
</body>
</html>
