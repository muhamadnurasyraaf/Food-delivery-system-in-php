<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "1234";
    $db_name = "fooddelivery";

    $conn = new PDO("mysql:host=localhost;dbname=fooddelivery",$username,$password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

   if(!$conn){
    die(mysqli_connect_error());
   }
?>
