<?php
    require_once 'config.php';
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];


    if(isset($_POST['submit'])){
       $result = $conn->query("SELECT * FROM user WHERE username = '$username';");

       if($result){
        $data = mysqli_fetch_assoc($result);
        if(password_verify($password,$data['password'])){
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = true;
            header("Location: index.html");
        }
       }
       else{
        echo 'password incorrect';
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
                <input type="password" name="password" required="required">
                <span>Password</span>
            </div>

            <input type="submit" value="Enter" name="submit" class="enter">
            <p>Don't have an account? <a href="/register.html">Register</a></p>
        </div>
    </div>
</form>
</body>
</html>