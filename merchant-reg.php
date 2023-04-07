<?php
    $branding = $_POST['brand'];

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
        <div>
            <label for="branding">Branding</label>
            <input type="text" name="branding" id="branding" value="<?= $branding; ?>" >
        </div>
       
        <div>
            <label for="username">Username</label> 
            <input type="text" name="username" id="username" required>
        </div>  

        <div>
            <label for="email">Email</label> 
            <input type="email" name="email" id="email" required>
        </div>  

        <div>
            <label for="pass">Password</label> 
            <input type="password" name="password" id="pass" required>
        </div>  
        
        <div>
            <label for="pass1">Password Confirmation</label> 
            <input type="password" name="password1" id="pass1" required>
        </div>  


        

    </form>
</body>
</html>