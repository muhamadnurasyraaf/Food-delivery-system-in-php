<?php
    require_once 'config.php';
    $branding = htmlspecialchars($_POST['brand']);

    if(isset($_POST['submit']) && isset($_POST['branding']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $brand = htmlspecialchars($_POST['branding']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(strlen($brand) <= 20 && strlen($username) <= 40 && strlen($email) <= 50){
            if($password == $_POST['password1']){
                $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
                $result = $conn->query("INSERT INTO merchant(brand,username,email,password) VALUES('$brand','$username','$email','$password');");
                if($result){
                    //bring into merchant setup page
                    header("Location: ");
                }
                else{
                    //throw error flasher
                }
            }
            else{
                //throw error password not match 
            }
        }
        else{
            echo '$branding or username or email too long';
            echo ' Branding (20 characters) <br> Username(40 characters) <br> Email (50 characters)';
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
    <title>Merchant Registration</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <h3>Register Your Merchant</h3>
        <div>
            <label for="branding">Branding</label>
            <input type="text" name="branding" id="branding" value="<?= $branding; ?>" autocomplete="off">
        </div>
       
        <div>
            <label for="username">Username</label> 
            <input type="text" name="username" id="username" required autocomplete="off">
        </div>  

        <div>
            <label for="email">Email</label> 
            <input type="email" name="email" id="email" required autocomplete="off">
        </div>  

        <div>
            <label for="pass">Password</label> 
            <input type="password" name="password" id="pass" required>
        </div>  
        
        <div>
            <label for="pass1">Password Confirmation</label> 
            <input type="password" name="password1" id="pass1" required>
        </div>  

        <input type="submit" value="Sign Up" name="submit" class="btn">
    </form>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&family=Poppins:wght@400;600;700&family=Signika:wght@700&display=swap');
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            background-image:url("bg.jpg");
            background-size:cover;
        }
        form{
            font-family: 'Montserrat',sans-serif;
            color: white;
           margin-top: 12%;
           display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 2em;
            background-color: #171717;
            border-radius: 25px;
        }
        form div{
            display: flex;
            flex-direction: column;
        }
        form div input{
            outline: none;
            width: 200px;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            transition: all 0.4s ease;
            font-family: 'Poppins',sans-serif;
        }
        form div input:focus{
            color: white;
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #242424;
            background-color: transparent;
        }
        h3{
            text-decoration:overline;
        }
        .btn{
            font-family:'Montserrat',sans-serif;
            margin-top:1rem;
            cursor:pointer;
            color: white;
            background-color: #171717;
            border:none;
            font-size:20px;
            font-weight:300;
            text-transform:uppercase;
            transition: all 0.4s ease-in;
            padding: 2px 4px;
            width: 200px;
            transform: translateX(25px);
        }
        .btn:hover{
            border-radius: 4px;
            background-color: #ffedd3;
            color: black;
        }
        
    </style>
</body>
</html>