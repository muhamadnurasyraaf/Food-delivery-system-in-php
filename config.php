<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "1234";
    $db_name = "fooddelivery";

    $conn = mysqli_connect($hostname,$username,$password,$db_name);

   if(!$conn){
    die(mysqli_connect_error());
   }
?>
