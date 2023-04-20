<?php 
    require_once 'config.php';
    session_start();
    $currentid = $_SESSION['id'];

    $data = mysqli_fetch_assoc($conn->query("SELECT * FROM user WHERE id = '$currentid';"));
    
    if(isset($_POST['update'])){
        $fullname = $_POST['fname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        

        if(isset($_POST['password1'])){
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            if($pass1 == $pass2){
                $hashedpassword = password_hash($pass1,PASSWORD_DEFAULT);
                $result = $conn->query("UPDATE user SET fullname = '$fullname', username = '$username',email = '$email',password = '$hashedpassword' WHERE id = '$currentid';");
                if($result){
                    echo"
                    <script>
                        alert('Profile successfully updated');
                    </script>";
                    header("Location: userprofile.php");
                }
                else{
                    $msg = mysqli_error($conn);
                    echo"
                    <script>
                        alert('Profile failed to updated : $msg');
                    </script>";
                }
            }
            else{
                echo"
                <script>
                    alert('Password does not match');
                </script>
            ";
            }
        }else{
            $result = $conn->query("UPDATE user SET fullname = '$fullname',username = '$username',email = '$email' WHERE id = '$currentid';");
            if($result){
                echo "<script>alert('Profile successfully updated')</script>";
            }else{
                $msg = mysqli_error($conn);
                echo"
                    <script>
                        alert('Profile failed to update : $msg');
                    </script>
                ";
            }
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
    <link rel="stylesheet" href="/styles/set-address.css">
    <title>Edit Profile</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form">
        <h3>USER ADDRESS</h3>
        <input type="text" name="fname" placeholder="Full Name" autocomplete="off" value="<?= $data['fullname'];?>" required>
        <input type="text" name="username" placeholder="Username" autocomplete="off" value="<?= $data['username'];?>" required>
        <input type="text" name="email" placeholder="Email" autocomplete="off" value="<?= $data['email'];?>" required>
        <input type="password" name="password1" placeholder="Password" autocomplete="off">
        <input type="password" name="password2" placeholder="Password Confirmation" autocomplete="off">
        <input type="submit" value="Update" name="update" class="submit-btn">
    </div>
    <div class="submit-btn">
        <a href="userprofile.php"> &larr; Back to your profile</a>
    </div>
        
    </form>
</body>
</html>