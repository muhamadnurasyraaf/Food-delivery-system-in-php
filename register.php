<?php 
    require_once("config.php");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if($password === $password1)
        {
            $encryptedpassword = password_hash($password1,PASSWORD_DEFAULT);
            $sql = "INSERT INTO user(fullname,username,email,password) VALUES ('$name','$username','$email','$encryptedpassword');";
            $conn->query($sql);
        }
        else{
            echo "
            <script>
                alert('password not match');
                document.location.href = 'register.html';
            </script>
            
            ";
        }

        
        if($conn){
           echo "   
            <script>
                document.location.href = 'index.html';
            </script>
           ";
        }
        else{
            echo "
            <script>
                alert('Failed to register');
            </script>
            ";
        }
    }



?>